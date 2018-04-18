<?php

namespace App;

class GistParser
{
    public function parse(string $gistJson): GistCollection
    {
        $decoded = json_decode($gistJson, true);

        $gists = [];

        foreach ($decoded as $gistDecoded) {
            $gist = new Gist($gistDecoded['url']);

            foreach ($gistDecoded['files'] as $file) {
                $gist->addFile($file['raw_url']);
            }

            $gists[] = $gist;
        }

        return new GistCollection(...$gists);
    }
}
