<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:terms-and-condition.view')->only('index');
        $this->middleware('can:terms-and-condition.update')->only('UpdateOrCreate');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.terms-and-condition.index', ['termsAndConditions' => TermsAndCondition::first(),]);
    }

    public function UpdateOrCreate(Request $request)
    {
        $dataToUpdateOrCreate = [
            'description'         => $request->description,
        ];

        $termsAndCondition = TermsAndCondition::updateOrCreate([], $dataToUpdateOrCreate);

        $toastMessage = $termsAndCondition->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';

        flash()->success($toastMessage)->flash();
        return redirect()->back();
    }
}
