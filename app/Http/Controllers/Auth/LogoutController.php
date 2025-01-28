<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function logout(Request $request)
    {
        // Call the logout method from the UserService
        $this->userService->logout($request);

        // Redirect the user to the login page
        return redirect('/auth/login')->with('success', 'You have been logged out successfully.');
    }
}
