<?php

namespace Tests\Unit;

use App\Gist;
use App\GistCollection;
use PHPUnit\Framework\TestCase;

class GistCollectionTest extends TestCase
{
    /** @test */
    public function it_keeps_record_of_how_many_gists_have_been_added()
    {
        $collection = new GistCollection(...[
            new Gist('some url'),
            new Gist('some url'),
        ]);

        $this->assertCount(2, $collection);
    }
    
    /** @test */
    public function it_returns_zero_if_no_gists_given()
    {
        $this->assertCount(0, new GistCollection());
    }
    
    /** @test */
    public function it_returns_the_given_gist()
    {
        $urlGiven = 'some url';
        $anotherUrl = 'some other url';
        $collection = new GistCollection(...[
            new Gist($urlGiven),
            new Gist($anotherUrl),
        ]);

        $firstGist = $collection[0];
        $secondGist = $collection[1];

        $this->assertEquals($urlGiven, $firstGist->getUrl());
        $this->assertEquals($anotherUrl, $secondGist->getUrl());
    }
}
