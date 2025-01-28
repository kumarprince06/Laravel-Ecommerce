<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;


class RegisterController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

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

        // Check if the email already exists
        if ($this->userService->emailExists($validatedData['email'])) {
            return redirect('/auth/register')->withErrors([
                'email' => 'The email address is already registered. Please log in or use a different email.',
            ])->withInput();
        }

        // Register the user via UserService
        $this->userService->registerUser($validatedData);


        // Redirect to the login page with a success message
        return redirect('/auth/login')->with('success', 'Registration successful..! Please log in.');
    }
}
