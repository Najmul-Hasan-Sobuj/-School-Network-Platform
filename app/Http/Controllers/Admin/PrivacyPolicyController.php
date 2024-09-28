<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:privacy-policy.view')->only('index');
        $this->middleware('can:privacy-policy.update')->only('UpdateOrCreate');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.privacy-policy.index', [
            'privacyPolicies' => PrivacyPolicy::first(),
        ]);
    }

    public function UpdateOrCreate(Request $request)
    {
        $dataToUpdateOrCreate = [
            'description'         => $request->description,
        ];

        $privacyPolicy = PrivacyPolicy::updateOrCreate([], $dataToUpdateOrCreate);

        $toastMessage = $privacyPolicy->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';

        flash()->success($toastMessage)->flash();
        return redirect()->back();
    }
}
