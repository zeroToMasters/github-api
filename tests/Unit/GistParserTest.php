<?php

namespace App;

use PHPUnit\Framework\TestCase;

class GistParserTest extends TestCase
{
    /** @test */
    public function it_parses_a_single_gist_into_a_gist_collection()
    {
        $gistJson = <<<GIST
[
  {
    "url": "https://api.github.com/gists/0bb8435a0f595e14a6be2ef1f20ae210",   
    "files": {
      "Test": {
        "raw_url": "https://gist.githubusercontent.com/estringana/0bb8435a0f595e14a6be2ef1f20ae210/raw/b78e300b23a8d2be3aa7d7380e8147d3364a3681/Test"
      }
    }   
  }
]
GIST;
;
        $parser = new GistParser();
        $gistCollection = $parser->parse($gistJson);

        $this->assertInstanceOf(GistCollection::class, $gistCollection);
        $this->assertCount(1, $gistCollection);
    }

    /** @test */
    public function it_parses_the_url()
    {
        $url = "Some url";
        $gistJson = <<<GIST
[
  {
    "url": "{$url}",   
    "files": {
      "Test": {
        "raw_url": "https://gist.githubusercontent.com/estringana/0bb8435a0f595e14a6be2ef1f20ae210/raw/b78e300b23a8d2be3aa7d7380e8147d3364a3681/Test"
      }
    }   
  }
]
GIST;
        ;
        $parser = new GistParser();
        $gistCollection= $parser->parse($gistJson);

        $gist = $gistCollection[0];
        $this->assertEquals($url, $gist->getUrl());
    }
}
