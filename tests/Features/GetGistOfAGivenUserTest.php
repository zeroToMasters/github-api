<?php

namespace Tests\Features;

use PHPUnit\Framework\TestCase;
use App\GistService;
use App\Gistcollection;

class GetGistOfAGivenUserTest extends TestCase
{
	public function test_a_gist_collection_is_return_given_a_given_user()
	{
		$username = 'estringana';

		$gistService = new GistService($username);

		$collection = $gistService->getAll();

		$this->assertInstanceOf(Gistcollection::class, $collection);
		$this->assertCount(1, $collection);
	}
}
