<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            Account::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('status', 'Registration successful. Please log in.');
        } catch (QueryException $e) {
            // Handle the exception and return a proper response
            return back()->withErrors(['email' => 'Unable to create account. Please try again.']);
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Retrieve the credentials from the request
        $credentials = $request->only('email', 'password');
        $email = $credentials['email'];
        $password = $credentials['password'];

        // Find the user by email
        $user = Account::where('email', $email)->first();

        // Check if user exists and password matches
        if ($user && Hash::check($password, $user->password)) {
            // Log the user in
            Auth::login($user);
            $request->session()->flash('success', 'You have successfully logged in!');
            return redirect()->route('home');
        }

        // Login failed, redirect back with error message and input (except password)
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password')); // Preserve input except for the password field
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}