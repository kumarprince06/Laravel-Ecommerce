<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterationForm()
    {
        return view('auth.register');
    }


    /**
     * Handle the registration request.
     *
     * This method validates the user input, creates a new user record in the database,
     * and redirects the user to the login page with a success message upon successful registration.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Ensure the name is provided and within valid length
            'email' => 'required|email|unique:users', // Email must be valid and unique in the users table
            'password' => 'required|string|min:6', // Password must have a minimum length of 6 and match the confirmation field
        ]);

        // Check if the email already exists in the database
        if (User::where('email', $request->email)->exists()) {
            // Redirect back to the registration page with an error message
            return redirect('/auth/register')->withErrors([
                'email' => 'The email address is already registered. Please log in or use a different email.',
            ])->withInput(); // Keep the previously entered data except for the password
        }

        // Create a new user record in the database
        User::create([
            'name' => $request->name, // Assign the user's name
            'email' => $request->email, // Assign the user's email
            'password' => Hash::make($request->password), // Hash the password before storing it
        ]);


        // Redirect to the login page with a success message
        return redirect('/auth/login')->with('success', 'Registration successful! Please log in.');
    }
}
