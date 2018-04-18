<?php

namespace App\Dtos;

use ArrayObject;

class GistCollection extends ArrayObject
{
    public function __construct(Gist ...$gists)
    {
        parent::__construct();
        foreach ($gists as $gist) {
            $this->append($gist);
        }
    }

    public function getFiles(): array
    {
        $files = [];

        /** @var Gist $gist */
        foreach($this as $gist) {
            $files = array_merge($files,$gist->getFiles());
        }

        return $files;
    }
}
