<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session to prevent session fixation
        $request->session()->invalidate();

        // Regenerate the session ID for security
        // $request->session()->regenerateToken();

        // Redirect the user to a specific page after logout, such as the home page or login page
        return redirect('/auth/login')->with('success', 'You have been logged out successfully.');
    }
}
