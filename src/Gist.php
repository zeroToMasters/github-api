<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Exceptions\UserNotFoundException;

class Gist
{
	private $username;

	public function __construct(string $username)
	{
		$this->username = $username;
	}

	public function list()
	{
		$client = new Client();

		try {
			$response = $client->get('https://api.github.com/users/'.$this->username.'/gists');
			$body = (string) $response->getBody();

			return json_decode($body);
		} catch (ClientException $exception) {
			$response = $exception->getResponse();
			if ($response->getStatusCode() == 404) {
				throw new UserNotFoundException();
			}

		}
	}
}