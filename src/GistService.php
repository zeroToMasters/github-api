<?php

namespace App;

use GuzzleHttp\Client;
use App\Dtos\GistCollection;

class GistService
{
    private $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    private function getEndpoint(): string
    {
        return sprintf('https://api.github.com/users/%s/gists', $this->username);
    }

    public function getAll(): GistCollection
    {
        $httpClient = new Client();
        $response = $httpClient->get($this->getEndpoint());

        $responseDecoded = json_decode($response->getBody());

        return new GistCollection($responseDecoded);
    }
}
