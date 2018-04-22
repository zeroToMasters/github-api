<?php

namespace Tests\Features;

use PHPUnit\Framework\TestCase;
use App\GistService;
use App\Dtos\GistCollection;
use App\Exceptions\UserNotFoundException;

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

    public function test_exception_is_thrown_when_username_not_found()
    {
        $nonExistingUsername = 'not-existing-username';
        $isExceptionThrown = false;

        try {
            $gistService = new GistService($nonExistingUsername);
            $collection = $gistService->getAll();
        } catch (UserNotFoundException $exception) {
            $isExceptionThrown = true;
        }

        $this->assertTrue($isExceptionThrown);
    }
}
