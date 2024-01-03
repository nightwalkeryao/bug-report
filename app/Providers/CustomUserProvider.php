<?php

namespace App\Providers;

use App\Models\CustomUserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUserProvider
{
    private $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function getModel()
    {
        return new CustomUserModel();
    }

    public function retrieveById($identifier)
    {
        return $this->model->find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        return $this->model->find($identifier);
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        return;
    }

    public function retrieveByCredentials(array $credentials)
    {
        return $this->model->where($this->model->getAuthEmailName(), $credentials['username'])->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return Hash::check($credentials['password'], $user->{$this->model->getAuthPasswordName()});
    }
}
