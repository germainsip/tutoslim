<?php


namespace App\Action;


use App\Domaine\User\Service\UserReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserReadAction
{

    private $userReader;

    public function __construct(UserReader $userReader)
    {
        $this->userReader = $userReader;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface
    {
// Collect input from the HTTP request
        $userId = (int)$args['id'];

        // Invoke the Domain with inputs and retain the result
        $userData = $this->userReader->getUserDetails($userId);

        // Transform the result into the JSON representation
        $result = [
            'user_id' => $userData->id,
            'username' => $userData->username,
            'first_name' => $userData->firstname,
            'last_name' => $userData->lastname,
            'email' => $userData->email,
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}