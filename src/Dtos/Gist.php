<?php

namespace App\Dtos;

class Gist
{
	private $url;
	private $files;

	public function __construct(string $url, FilesCollection $filesCollection)
	{
		$this->url = $url;
		$this->files = $filesCollection;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function getFiles(): FilesCollection
	{
		return $this->files;
	}
}
