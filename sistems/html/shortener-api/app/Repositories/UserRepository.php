<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUser(String $email, String $password)
    {
        return $this->model->where("email", $email)->where("password", $password)->first();
    }
}
