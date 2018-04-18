<?php

namespace App;

class GistService
{
	public function getAll()
	{
		return new GistCollection();
	}
}
