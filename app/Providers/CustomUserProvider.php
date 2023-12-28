<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUserProvider
{
    public function retrieveById($identifier)
    {
        return User::find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        return User::find($identifier);
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        return;
    }

    public function retrieveByCredentials(array $credentials)
    {
        return User::where('custom_email_column', $credentials['username'])->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return Hash::check($credentials['password'], $user->custom_password_column);
    }
}
