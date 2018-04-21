<?php

namespace App;

use GuzzleHttp\Client;

class GistService
{
	public function getAll(): GistCollection
	{
		$url = 'https://api.github.com/users/estringana/gists';
		$httpClient = new Client();
		$response = $httpClient->get($url);

		$responseDecoded = json_decode($response->getBody());	

		return new GistCollection($responseDecoded);
	}
}
