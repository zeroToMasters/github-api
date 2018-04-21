<?php

namespace Tests\Features;

use PHPUnit\Framework\TestCase;
use App\GistService;
use App\GistCollection;

class WeCanGetAllGistsFromAGivenUserTest extends TestCase
{
	public function test_we_can_get_all_gists_of_a_given_user()
	{
		$username = 'estringana';

		$gistService = new GistService($username);

		$collection = $gistService->getAll();

		$this->assertInstanceOf(GistCollection::class, $collection);
		$this->assertCount(2, $collection);
	}
}
