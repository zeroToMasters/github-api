<?php

namespace Tests\Features;

use App\GistService;
use PHPUnit\Framework\TestCase;

class GetGistOfAGivenUserTest extends TestCase
{
    public function test_a_gist_collection_is_return_given_a_given_user()
    {
        $username = 'estringana';

        $gistService = new GistService($username);

        $collection = $gistService->getAll();

        $this->assertCount(1, $collection);
    }
}
