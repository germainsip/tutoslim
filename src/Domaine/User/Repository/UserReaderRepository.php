<?php


namespace App\Domaine\User\Repository;


use App\Domaine\User\Data\UserData;
use DomainException;
use PDO;
use function DI\string;

class UserReaderRepository
{

    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getUserById(int $userId): UserData
    {
        $sql = "SELECT * FROM users WHERE id = :id;";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $userId]);

        $row = $statement->fetch();

        if(!$row){
            throw new DomainException(sprintf('User not found: %s', $userId));
        }

        $user = new UserData();
        $user->id = (int)$row['id'];
        $user->username = (string)$row['username'];
        $user->firstname = (string)$row['first_name'];
        $user->lastname = (string)$row['last_name'];
        $user->email = (string)$row['email'];

        return $user;


    }
}