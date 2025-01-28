<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return User
     */
    public function registerUser(array $data);

    /**
     * Check if an email already exists.
     *
     * @param string $email
     * @return bool
     */
    public function emailExists(string $email): bool;


    /**
     * Authenticate the user based on email and password.
     *
     * @param string $email
     * @param string $password
     * @return \App\Models\User|null
     */
    public function authenticateUser(string $email, string $password);
}
