<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     *
     * This method authenticates the user based on the provided credentials (email and password).
     * If authentication is successful, the user is redirected to the intended route or the home page.
     * If authentication fails, the user is redirected back to the login page with an error message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email', // Ensure email is present and in a valid format
            'password' => 'required',    // Ensure password is provided
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'password.required' => 'Password is required.',
        ]);

        // Extract only the 'email' and 'password' from the request
        $credentials = $request->only('email', 'password');

        // Check if a user exists with the provided email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            // Email not found
            return redirect()
                ->back()
                ->withInput() // Retain input values
                ->withErrors(['email' => 'Email not found. Please try again.']);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            // Password incorrect
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['password' => 'Incorrect password. Please try again.']);
        }

        // If email and password match, log the user in
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'admin'
        ) { // Assuming 'role' is the field to check
            return redirect('/admin/dashboard');
        } else {
            return redirect('/');
        }
    }
}
