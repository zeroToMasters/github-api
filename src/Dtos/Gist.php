<?php

namespace App\Dtos;

class Gist
{
	private $url;
	private $files;

	public function __construct(string $url, array $files)
	{
		$this->url = $url;
		$this->files = $files;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function getFiles(): array
	{
		return $this->files;
	}
}
