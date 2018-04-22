<?php

namespace Tests\Features;

use PHPUnit\Framework\TestCase;
use App\GistService;
use App\Dtos\GistCollection;

class WeCanGetAllGistsFromAGivenUserTest extends TestCase
{
    public function test_we_can_get_all_gists_of_a_given_user()
    {
        $existingUsername = 'estringana';

        $gistService = new GistService($existingUsername);
        $collection = $gistService->getAll();

        $this->assertInstanceOf(GistCollection::class, $collection);
        $this->assertCount(2, $collection);
    }
}
