<?php

namespace App;

use App\Dtos\GistCollection;
use App\Dtos\Gist;

class GistParser
{
	public function parse(string $jsonContent): GistCollection
	{
		$responseDecoded = json_decode($jsonContent);

        $gists = [];
        foreach($responseDecoded as $gistArray) {
            $gists[] = new Gist($gistArray->url);
        }

        return new GistCollection(...$gists);
	}
}
