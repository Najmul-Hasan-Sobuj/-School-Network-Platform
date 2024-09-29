<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $schools = School::all();
        return view('auth.register', compact('schools'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:M,F'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:100'],
            'dob' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'school_id' => ['required', 'exists:schools,id'],
        ]);

        $user = User::create([
            'name'        => $request->name,
            'gender'      => $request->gender,
            'address'     => $request->address,
            'country'     => $request->country,
            'dob'         => $request->dob,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'school_id'   => $request->school_id,
            'is_approved' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
