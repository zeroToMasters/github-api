<?php

namespace App;

use GuzzleHttp\Client;
use App\Dtos\GistCollection;
use App\Exceptions\UserNotFoundException;
use GuzzleHttp\Exception\ClientException;

class GistService
{
    private $username;
    private $httpClient;

    public function __construct(string $username, Client $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->username = $username;
    }

    private function getEndpoint(): string
    {
        return sprintf('https://api.github.com/users/%s/gists', $this->username);
    }

    public function getAll(): GistCollection
    {
        try {
            $response = $this->httpClient->get($this->getEndpoint());
        } catch (ClientException $exception) {
            throw new UserNotFoundException();
        }

        $gistParser = new GistParser();

        return $gistParser->parse($response->getBody());
    }
}
