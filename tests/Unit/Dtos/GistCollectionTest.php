<?php

namespace Tests\Unit;

use App\Dtos\Gist;
use App\Dtos\GistCollection;
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

    /** @test */
    public function it_gets_a_list_of_all_files_on_all_gists()
    {
        $file01 = 'file01OnGist01';
        $file02 = 'file02OnGist01';
        $file03 = 'file01OnGist02';

        $gist01 = new Gist('some url');
        $gist01->addFile($file01);
        $gist01->addFile($file02);

        $gist02 = new Gist('some url');
        $gist02->addFile($file03);

        $collection = new GistCollection(...[
            $gist01,
            $gist02,
        ]);

        $this->assertEquals(
            [
                $file01,
                $file02,
                $file03,
            ],
            $collection->getFiles()
        );
    }
}
