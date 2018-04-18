<?php

namespace App\Dtos;

class Gist
{
    private $url;
    private $files;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->files = [];
    }

    public function addFile(string $file)
    {
        $this->files[] = $file;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getFiles(): array
    {
        return $this->files;
    }
}
