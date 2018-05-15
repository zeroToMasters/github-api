<?php

namespace App\Dtos;

use ArrayObject;

class GistCollection extends ArrayObject
{
	public function __construct(Gist ...$gists)
	{
		foreach($gists as $gist) {
			$this->append($gist);
		}
	}

	public function getFiles(): FilesCollection
	{
		$filesCollection = new FilesCollection();

		foreach($this as $gist) {
			$filesCollection->add($gist->getFiles());
		}

		return $filesCollection;
	}
}
