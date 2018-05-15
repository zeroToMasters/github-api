<?php

namespace App\Dtos;

use ArrayObject;

class FilesCollection extends ArrayObject
{
	public function add(array $files)
	{
		foreach ($files as $file) {
			$this->append($file);
		}
	}
}
