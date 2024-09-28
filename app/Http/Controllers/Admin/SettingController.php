<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\EmailSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:setting.update')->only(['updateOrCreate', 'emailUpdate']);
        $this->middleware('can:setting.view')->only('index');
        $this->middleware('can:email.update')->only('emailUpdate');
        $this->middleware('can:email.sendTest')->only('sendTestEmail');
    }

    /**
     * Display the form for managing settings.
     */
    public function index()
    {
        return view('admin.pages.setting.index', [
            'settings' => Setting::first(),
            'emailSettings' => EmailSetting::first(),
        ]);
    }

    /**
     * Update the settings.
     */
    public function UpdateOrCreate(Request $request)
    {
        $request->validate([
            'whatsapp_chat_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'gmail_url' => 'nullable|url',
            'google_map_url' => 'nullable|url',
            'site_logo' => 'sometimes|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'login_page_bg_image' => 'sometimes|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'meta_image' => 'sometimes|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'site_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email:rfc,dns',
            'phone' => [
                'nullable',
                'digits:11',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^01[3-9]\d{8}$/', $value)) {
                        $fail('The ' . $attribute . ' must be a valid Bangladeshi mobile number without the country code.');
                    }
                },
            ],
        ]);

        // Fetch the current settings to check if there's an existing logo
        $currentSettings = Setting::first();

        $dataToUpdateOrCreate = [
            'whatsapp_chat_url' => $request->whatsapp_chat_url,
            'facebook_url'      => $request->facebook_url,
            'youtube_url'       => $request->youtube_url,
            'gmail_url'         => $request->gmail_url,
            'google_map_url'    => $request->google_map_url,
            'site_name'         => $request->site_name,
            'address'           => $request->address,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
        ];

        Config::set('app.name', $request->site_name);

        // if ($request->has('google_analytics_code')) {
        //     putenv("GOOGLE_ANALYTICS_CODE={$request->google_analytics_code}");
        // }

        if ($request->hasFile('site_logo')) {
            $siteLogoPath = uploadImage($request->file('site_logo'), 'site_logos');

            if ($siteLogoPath) {
                // Check if there's an existing site logo and delete it
                if ($currentSettings && $currentSettings->site_logo) {
                    $existingLogoPath = storage_path('app/public/' . $currentSettings->site_logo);
                    if (File::exists($existingLogoPath)) {
                        File::delete($existingLogoPath);
                    }
                }
                $dataToUpdateOrCreate['site_logo'] = $siteLogoPath;
            }
        }

        // Handle login page background image
        if ($request->hasFile('login_page_bg_image')) {
            $loginPageBgImagePath = uploadImage($request->file('login_page_bg_image'), 'login_page_bg_images');

            if ($loginPageBgImagePath) {
                // Check if there's an existing login page background image and delete it
                if ($currentSettings && $currentSettings->login_page_bg_image) {
                    $existingBgImagePath = storage_path('app/public/' . $currentSettings->login_page_bg_image);
                    if (File::exists($existingBgImagePath)) {
                        File::delete($existingBgImagePath);
                    }
                }
                $dataToUpdateOrCreate['login_page_bg_image'] = $loginPageBgImagePath;
            }
        }

        // Handle login page Meta Image
        if ($request->hasFile('meta_image')) {
            $loginPageBgImagePath = uploadImage($request->file('meta_image'), 'meta_images');

            if ($loginPageBgImagePath) {
                // Check if there's an existing login page Meta Image and delete it
                if ($currentSettings && $currentSettings->meta_image) {
                    $existingBgImagePath = storage_path('app/public/' . $currentSettings->meta_image);
                    if (File::exists($existingBgImagePath)) {
                        File::delete($existingBgImagePath);
                    }
                }
                $dataToUpdateOrCreate['meta_image'] = $loginPageBgImagePath;
            }
        }

        $settings = Setting::updateOrCreate([], $dataToUpdateOrCreate);

        $toastMessage = $settings->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';

        flash()->success($toastMessage)->flash();
        return redirect()->back();
    }

    /**
     * Update the specified email settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function emailUpdate(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'driver' => 'required|string',
            'host' => 'required|string',
            'port' => 'required|integer',
            'username' => 'required|string',
            'password' => [
                'sometimes',
                'string',
                // Add custom validation rule to disallow whitespace
                'regex:/^\S*$/',
            ],
            'encryption' => 'nullable|string',
            'from_address' => 'required|email:rfc,dns',
            'from_name' => 'required|string',
        ]);

        // Update or create the email settings record
        $emailSetting = EmailSetting::updateOrCreate([], [
            'driver'       => $validatedData['driver'],
            'host'         => $validatedData['host'],
            'port'         => $validatedData['port'],
            'username'     => $validatedData['username'],
            'password'     => $validatedData['password'],
            'encryption'   => $validatedData['encryption'],
            'from_address' => $validatedData['from_address'],
            'from_name'    => $validatedData['from_name'],
        ]);

        // Update mail configuration values using Config facade
        Config::set('mail.driver', $validatedData['driver']);
        Config::set('mail.host', $validatedData['host']);
        Config::set('mail.port', $validatedData['port']);
        Config::set('mail.username', $validatedData['username']);
        Config::set('mail.password', $validatedData['password']);
        Config::set('mail.encryption', $validatedData['encryption']);
        Config::set('mail.from.address', $validatedData['from_address']);
        Config::set('mail.from.name', $validatedData['from_name']);

        // Update .env file
        $envContent = file_get_contents(base_path('.env'));
        $envContent = preg_replace('/MAIL_DRIVER=.*/', 'MAIL_DRIVER=' . $validatedData['driver'], $envContent);
        $envContent = preg_replace('/MAIL_HOST=.*/', 'MAIL_HOST=' . $validatedData['host'], $envContent);
        $envContent = preg_replace('/MAIL_PORT=.*/', 'MAIL_PORT=' . $validatedData['port'], $envContent);
        $envContent = preg_replace('/MAIL_USERNAME=.*/', 'MAIL_USERNAME=' . $validatedData['username'], $envContent);
        $envContent = preg_replace('/MAIL_PASSWORD=.*/', 'MAIL_PASSWORD=' . $validatedData['password'], $envContent);
        $envContent = preg_replace('/MAIL_ENCRYPTION=.*/', 'MAIL_ENCRYPTION=' . $validatedData['encryption'], $envContent);
        file_put_contents(base_path('.env'), $envContent);

        // Redirect back with a success message
        $toastMessage = $emailSetting->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';
        flash()->success($toastMessage)->flash();
        return redirect()->back();
    }

    /**
     * Send a test email using the configured email settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendTestEmail()
    {
        // Retrieve the email settings from the database
        $emailSettings = EmailSetting::first();

        // Check if email settings exist
        if (!$emailSettings) {
            return redirect()->back()->with('error', 'No email settings found. Please configure email settings first.');
        }

        // Send test email
        try {
            Mail::raw('This is a test email.', function ($message) use ($emailSettings) {
                $message->from($emailSettings->from_address, $emailSettings->from_name)
                    ->to('najmulhasansobuj@gmail.com')
                    ->subject('Test Email');
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send test email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Test email sent successfully.');
    }
}
