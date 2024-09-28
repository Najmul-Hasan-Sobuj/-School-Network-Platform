<?php

namespace App\Http\Controllers\Frondend;

use App\Models\Admin\PrivacyPolicy;
use App\Http\Controllers\Controller;
use App\Models\Admin\TermsAndCondition;

class FrontendController extends Controller
{
    /**
     * Display the form for managing settings.
     */
    public function index()
    {
        return view('welcome', [
            'termsAndCondition' => TermsAndCondition::first(),
            'privacyPolicy'     => PrivacyPolicy::first(),
        ]);
    }

    public function privacyPolicy()
    {
        return view('privacyPolicy', [
            'privacyPolicy' => PrivacyPolicy::first(),
        ]);
    }

    public function termsAndCondition()
    {
        return view('termsAndServices', [
            'termsAndCondition' => termsAndCondition::first(),
        ]);
    }
}
