<?php

<<<<<<< HEAD
=======

>>>>>>> 1c6d3528dce204dca9665309fcb829d7e59f8e72
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function create(array $userData);
    public function findByEmail(string $email);
}
