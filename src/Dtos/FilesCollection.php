<?php

namespace App\Dtos;

use ArrayObject;

class FilesCollection extends ArrayObject
{
	public function __construct(File ...$files)
	{
		foreach($files as $file) {
			$this->add($file);
		}
	}

	public function merge(FilesCollection $files)
	{
		foreach ($files as $file) {
			$this->add($file);
		}
	}

	private function add(File $file)
	{
		$this->append($file);
	}
}
