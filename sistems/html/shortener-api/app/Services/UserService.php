<?php

namespace  App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $repository;

    function __construct(
        UserRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function getUser(String $email, String $password)
    {
        return $this->repository->getUser($email, $password);
    }
}
