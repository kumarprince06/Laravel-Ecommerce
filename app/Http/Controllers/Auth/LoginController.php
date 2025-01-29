<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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

        // Delegate authentication logic to the UserService
        $user = $this->userService->authenticateUser($validatedData['email'], $validatedData['password']);


        // If authentication fails
        if (!$user) {
            return redirect()
                ->back()
                ->withInput() // Retain input values
                ->withErrors(['email' => 'Invalid email or password. Please try again.']);
        }

        // Log the user in
        Auth::login($user);

        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/');
    }
}
