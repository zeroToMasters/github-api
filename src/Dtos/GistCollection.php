<?php

namespace App\Dtos;

use ArrayObject;

class GistCollection extends ArrayObject
{
	public function __construct(array $gistsArray)
	{
		foreach($gistsArray as $gistArray) {
			$this->append(new Gist($gistArray->url));
		}
	}
}
