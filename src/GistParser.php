<?php

namespace App;

use App\Dtos\GistCollection;
use App\Dtos\FilesCollection;
use App\Dtos\File;
use App\Dtos\Gist;

class GistParser
{
    const FIELD_URL = 'url';
    const FIELD_FILES = 'files';
    const FIELD_FILENAME = 'filename';

    private function decode(string $contentToBeDecoded): array
    {
        return json_decode($contentToBeDecoded, true);
    }

	public function parse(string $contentEncoded): GistCollection
	{
		$contentDecoded = $this->decode($contentEncoded);

        return $this->parseGists($contentDecoded);
	}

    private function parseGists(array $content): GistCollection
    {
        $gists = [];
        foreach($content as $gistArray) {
            $files = $this->parseFiles($gistArray);
            $gists[] = new Gist($gistArray[self::FIELD_URL], new FilesCollection(...$files));
        }

        return new GistCollection(...$gists);
    }

    private function parseFiles(array $gistArray): array
    {
        $files = [];
        $filesArray = $gistArray[self::FIELD_FILES] ?? [];
        foreach ($filesArray as $file) {
            $files[] = new File($file[self::FIELD_FILENAME]);
        }

        return $files;
    }
}
