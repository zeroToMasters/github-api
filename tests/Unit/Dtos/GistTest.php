<?php

namespace Tests\Unit;

use App\Dtos\Gist;
use PHPUnit\Framework\TestCase;

class GistTest extends TestCase
{
    /** @test */
    public function it_returns_the_given_url()
    {
        $url = 'Given Url';

        $gist = new Gist($url);

        $this->assertEquals($url, $gist->getUrl());
    }
    
    /** @test */
    public function it_returns_all_the_files()
    {
        $file02 = 'file02';
        $file01 = 'file01';

        $gist = new Gist('Some url');

        $gist->addFile($file01);
        $gist->addFile($file02);

        $this->assertEquals([$file01, $file02], $gist->getFiles());
    }

    /** @test */
    public function it_returns_empty_array_if_not_files_provided()
    {
        $gist = new Gist('Some url');

        $this->assertEmpty($gist->getFiles());
    }
}
