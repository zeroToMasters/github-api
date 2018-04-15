<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Gist;
use App\Exceptions\UserNotFoundException;


class GivenAUserWeCanSeeAllGistsTest extends TestCase
{
	public function test_we_can_get_all_gists_of_a_given_user()
	{
		$gist = new Gist('estringana');
		$gists = $gist->list();

		$this->assertCount(1, $gists);
	}

	public function test_exception_is_thrown_when_user_not_found()
	{
		$exceptionThrown = false;
		try {
			$gist = new Gist('user-not-found');
			$gists = $gist->list();
		} catch (UserNotFoundException $exception) {
			$exceptionThrown = true;
		}
		

		$this->assertTrue($exceptionThrown);
	}
}