<?php

namespace App;

class Gist
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function addFile($raw_url)
    {
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
