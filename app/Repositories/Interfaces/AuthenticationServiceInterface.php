<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

interface AuthenticationServiceInterface
{
    public function login(Request $request): bool;

    public function logout(): void;
}
