<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register a new user.
     *
     * @param array $data
     * @return User
     */
    public function registerUser(array $data)
    {
        // Hash the password before passing to the repository
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    /**
     * Check if an email already exists.
     *
     * @param string $email
     * @return bool
     */
    public function emailExists(string $email): bool
    {
        return $this->userRepository->getAll()->where('email', $email)->isNotEmpty();
    }

    /**
     * Authenticate the user based on email and password.
     *
     * @param string $email
     * @param string $password
     * @return \App\Models\User|null
     */
    public function authenticateUser(string $email, string $password)
    {
        // Find the user by email
        $user = $this->userRepository->getAll()->where('email', $email)->first();

        // If user doesn't exist or password doesn't match
        if (!$user || !Hash::check($password, $user->password)) {
            return null; // Authentication failed
        }

        return $user; // Return the user if authenticated
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out using Laravel's Auth facade
        // Invalidate the session to prevent session fixation
        $request->session()->invalidate();
    }
}
