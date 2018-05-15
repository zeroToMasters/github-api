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
        	$files = [];
        	$filesArray = $gistArray->files ?? [];
        	foreach ($filesArray as $file) {
        		$files[] = $file->filename;
        	}
            $gists[] = new Gist($gistArray->url, $files);
        }

        return new GistCollection(...$gists);
	}
}
