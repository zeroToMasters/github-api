<?php

namespace App\Dtos;

class Gist
{
	private $url;

	public function __construct(string $url)
	{
		$this->url = $url;
	}

	public function getUrl(): string
	{
		return $this->url;
	}
}
