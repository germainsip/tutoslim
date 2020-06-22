<?php


namespace App\Domaine\User\Service;


use App\Domaine\User\Data\UserData;
use App\Domaine\User\Repository\UserReaderRepository;
use App\Exception\ValidationException;

class UserReader
{
private $repository;

public function __construct(UserReaderRepository $repository)
{
    $this->repository = $repository;
}

public function getUserDetails(int $userId): UserData{

    if (empty($userId)){
        throw new ValidationException('User ID required');
    }

    $user = $this->repository->getUserById($userId);

    return $user;
}
}