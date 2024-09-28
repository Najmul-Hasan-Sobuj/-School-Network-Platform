<?php

use Illuminate\Support\Str;
use App\Models\Admin\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

function uploadImage($file, $folder = 'images')
{
    if (!$file) {
        return null;
    }

    $extension = $file->getClientOriginalExtension();
    $fileName = rand(100000, 999999) . '.' . $extension;

    $uploadPath = storage_path("app/public/$folder");

    // Check if directory exists, create if not
    if (!is_dir($uploadPath)) {
        // Attempt directory creation
        if (!mkdir($uploadPath, 0777, true)) {
            // Directory creation failed
            abort(404, "Failed to create directory: $uploadPath");
        }
    }

    // Ensure the directory was created successfully
    if (!is_dir($uploadPath)) {
        abort(404, "Failed to create directory: $uploadPath");
    }

    // Move the uploaded file to the upload path
    $file->move($uploadPath, $fileName);

    // Construct the file path
    $filePath = "$folder/$fileName";

    // Return the file path
    return $filePath;
}


if (!function_exists('get_site_logo_url')) {
    function get_site_logo_url()
    {
        $settings = Setting::first();
        return optional($settings)->site_logo ? asset('storage/' . $settings->site_logo) : asset('admin/src/assets/images/site-logo.png');
    }
}

if (!function_exists('login_page_bg_url')) {
    function login_page_bg_url()
    {
        $settings = Setting::first();
        return optional($settings)->login_page_bg_image ? asset('storage/' . $settings->login_page_bg_image) : null;
    }
}

if (!function_exists('metadata')) {
    function metadata()
    {
        return Setting::first();
    }
}


/**
 * Generate a formatted API response.
 *
 * @param  string|null  $type     The type of response.
 * @param  string|null  $message  The message to include.
 * @param  mixed|null   $data     Additional data to include.
 * @param  int|null     $status   The HTTP status code.
 * @return \Illuminate\Http\JsonResponse
 */

function generateApiResponse($type = null, $message = null, $data = null, $status = null)
{
    return response()->json([
        'type'    => $type,
        'message' => $message,
        'data'    => $data,
        'status'  => $status,
    ]);
}


/**
 *
 * @param  response
 * @return \Illuminate\Http\Response
 * @author Asif Ul Islam <bpdevs1032@gmail.com>
 * @return void
 */
function  sendSuccessResponse($data, $msg = "Data Retrive Successfully", $code = 200)
{
    return response()->json([
        'success' => true,
        'message' => $msg,
        'code' => $code,
        'result' => $data
    ], $code);
}


/**
 *
 * @param  response
 * @return \Illuminate\Http\Response
 * @author Asif Ul Islam <bpdevs1032@gmail.com>
 * @return void
 */
function  sendErrorResponse($data = [], $msg = "Something Went wrong", $code = 500)
{
    return response()->json([
        'success' => false,
        'message' => $msg,
        'code' => $code,
        'result' => $data
    ], $code);
}
