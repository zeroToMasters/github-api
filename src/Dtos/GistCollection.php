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
}
