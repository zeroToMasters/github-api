<?php

namespace App\Dtos;

class File
{
	private $filename;

	public function __construct(string $filename)
	{
		$this->filename = $filename;
	}
	public function getFilename(): string
	{
		return $this->filename;
	}
}
