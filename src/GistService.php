<?php

namespace App;

use App\Dtos\GistParser;
use GuzzleHttp\Client;

class GistService
{
	private $username;

	public function __construct(string $username)
	{
		$this->username = $username;
	}

	public function getAll()
	{
		$client = new Client();
		$response = $client->get('https://api.github.com/users/'.$this->username.'/gists');
		$parser =  new GistParser();

		return $parser->parse((string) $response->getBody());
	}
}
