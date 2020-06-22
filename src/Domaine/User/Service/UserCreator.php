<?php


namespace App\Domaine\User\Service;

use App\Domain\User\Repository\UserCreatorRepository;
use App\Exception\ValidationException;


/**
 * Class UserCreator
 * Service
 * @package App\Domaine\User\Service
 */
final class UserCreator
{
    /**
     * @var UserCreatorRepository
     */
    private $repository;

    /**
     * Le constructeur
     *
     */
    public function __construct(UserCreatorRepository $repository)
    {
        $this->repository = $repository;

    }

    public function createUser(array $data): int {
        // Input validation
        $this->validateNewUser($data);

        // Insert user
        $userId = $this->repository->insertUser($data);

        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $userId;
    }

    private function validateNewUser(array $data): void
    {
        $errors =[];

        if (empty($data['username'])){
            $errors['username'] = 'Input required';
        }

        if (empty($data['email'])){
            $errors['email'] = 'Input required';

        } elseif (filter_var($data['email'],FILTER_VALIDATE_EMAIL) === false){
            $errors['email'] = 'Invalid email adress';
        }

        if($errors) {
            throw new ValidationException('Please check your input',$errors);
        }
    }
}