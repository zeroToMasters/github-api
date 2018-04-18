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
}
