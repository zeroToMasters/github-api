<?php

namespace App;

use App\Dtos\GistParser;
use GuzzleHttp\Client;

class GistService
{
    const GITHUB_GIST_URL = 'https://api.github.com/users/%s/gists';

	private $username;

	public function __construct(string $username)
	{
		$this->username = $username;
	}

	public function getAll()
	{
		$client = new Client();
		$response = $client->get($this->getUrl());
		$parser =  new GistParser();

		return $parser->parse((string) $response->getBody());
	}

    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return sprintf(self::GITHUB_GIST_URL, $this->username);
    }
}
