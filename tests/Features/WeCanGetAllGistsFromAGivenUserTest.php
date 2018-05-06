<?php

namespace Tests\Features;

use PHPUnit\Framework\TestCase;
use App\GistService;
use App\Dtos\GistCollection;
use App\Dtos\Gist;
use App\Exceptions\UserNotFoundException;
use GuzzleHttp\Psr7\Response;

class WeCanGetAllGistsFromAGivenUserTest extends TestCase
{
    public function test_we_can_get_all_gists_of_a_given_user()
    {
        $gistResponse = <<<RESPONSE
[
  {
    "url": "https://api.github.com/gists/da17d9a756d9eacbbe741811c515e477",
    "forks_url": "https://api.github.com/gists/da17d9a756d9eacbbe741811c515e477/forks",
    "commits_url": "https://api.github.com/gists/da17d9a756d9eacbbe741811c515e477/commits",
    "id": "da17d9a756d9eacbbe741811c515e477",
    "git_pull_url": "https://gist.github.com/da17d9a756d9eacbbe741811c515e477.git",
    "git_push_url": "https://gist.github.com/da17d9a756d9eacbbe741811c515e477.git",
    "html_url": "https://gist.github.com/da17d9a756d9eacbbe741811c515e477",
    "files": {
      "Parser.php": {
        "filename": "Parser.php",
        "type": "application/x-httpd-php",
        "language": "PHP",
        "raw_url": "https://gist.githubusercontent.com/estringana/da17d9a756d9eacbbe741811c515e477/raw/9cb3f443ce4d1f281f6b0f2dbe8a661c86ed2152/Parser.php",
        "size": 21
      }
    },
    "public": true,
    "created_at": "2018-04-28T08:31:42Z",
    "updated_at": "2018-04-28T08:31:43Z",
    "description": "Collection Parser",
    "comments": 0,
    "user": null,
    "comments_url": "https://api.github.com/gists/da17d9a756d9eacbbe741811c515e477/comments",
    "owner": {
      "login": "estringana",
      "id": 1459126,
      "avatar_url": "https://avatars2.githubusercontent.com/u/1459126?v=4",
      "gravatar_id": "",
      "url": "https://api.github.com/users/estringana",
      "html_url": "https://github.com/estringana",
      "followers_url": "https://api.github.com/users/estringana/followers",
      "following_url": "https://api.github.com/users/estringana/following{/other_user}",
      "gists_url": "https://api.github.com/users/estringana/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/estringana/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/estringana/subscriptions",
      "organizations_url": "https://api.github.com/users/estringana/orgs",
      "repos_url": "https://api.github.com/users/estringana/repos",
      "events_url": "https://api.github.com/users/estringana/events{/privacy}",
      "received_events_url": "https://api.github.com/users/estringana/received_events",
      "type": "User",
      "site_admin": false
    },
    "truncated": false
  },
  {
    "url": "https://api.github.com/gists/b2cce3459ec0dc74c263c3423e285f34",
    "forks_url": "https://api.github.com/gists/b2cce3459ec0dc74c263c3423e285f34/forks",
    "commits_url": "https://api.github.com/gists/b2cce3459ec0dc74c263c3423e285f34/commits",
    "id": "b2cce3459ec0dc74c263c3423e285f34",
    "git_pull_url": "https://gist.github.com/b2cce3459ec0dc74c263c3423e285f34.git",
    "git_push_url": "https://gist.github.com/b2cce3459ec0dc74c263c3423e285f34.git",
    "html_url": "https://gist.github.com/b2cce3459ec0dc74c263c3423e285f34",
    "files": {
      "something.php": {
        "filename": "something.php",
        "type": "application/x-httpd-php",
        "language": "PHP",
        "raw_url": "https://gist.githubusercontent.com/estringana/b2cce3459ec0dc74c263c3423e285f34/raw/b28221b848a3733ec244f35750b1e390ef422405/something.php",
        "size": 15
      }
    },
    "public": true,
    "created_at": "2018-04-21T06:35:01Z",
    "updated_at": "2018-04-21T06:35:01Z",
    "description": "Example gist",
    "comments": 0,
    "user": null,
    "comments_url": "https://api.github.com/gists/b2cce3459ec0dc74c263c3423e285f34/comments",
    "owner": {
      "login": "estringana",
      "id": 1459126,
      "avatar_url": "https://avatars2.githubusercontent.com/u/1459126?v=4",
      "gravatar_id": "",
      "url": "https://api.github.com/users/estringana",
      "html_url": "https://github.com/estringana",
      "followers_url": "https://api.github.com/users/estringana/followers",
      "following_url": "https://api.github.com/users/estringana/following{/other_user}",
      "gists_url": "https://api.github.com/users/estringana/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/estringana/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/estringana/subscriptions",
      "organizations_url": "https://api.github.com/users/estringana/orgs",
      "repos_url": "https://api.github.com/users/estringana/repos",
      "events_url": "https://api.github.com/users/estringana/events{/privacy}",
      "received_events_url": "https://api.github.com/users/estringana/received_events",
      "type": "User",
      "site_admin": false
    },
    "truncated": false
  },
  {
    "url": "https://api.github.com/gists/6e7231062651291814324e63206ace14",
    "forks_url": "https://api.github.com/gists/6e7231062651291814324e63206ace14/forks",
    "commits_url": "https://api.github.com/gists/6e7231062651291814324e63206ace14/commits",
    "id": "6e7231062651291814324e63206ace14",
    "git_pull_url": "https://gist.github.com/6e7231062651291814324e63206ace14.git",
    "git_push_url": "https://gist.github.com/6e7231062651291814324e63206ace14.git",
    "html_url": "https://gist.github.com/6e7231062651291814324e63206ace14",
    "files": {
      "integrator.php": {
        "filename": "integrator.php",
        "type": "application/x-httpd-php",
        "language": "PHP",
        "raw_url": "https://gist.githubusercontent.com/estringana/6e7231062651291814324e63206ace14/raw/d85da7239bc1b80284b7dbde0d2096bb065e95dc/integrator.php",
        "size": 137
      }
    },
    "public": true,
    "created_at": "2018-04-21T05:45:13Z",
    "updated_at": "2018-04-21T05:45:39Z",
    "description": "Error on shop",
    "comments": 0,
    "user": null,
    "comments_url": "https://api.github.com/gists/6e7231062651291814324e63206ace14/comments",
    "owner": {
      "login": "estringana",
      "id": 1459126,
      "avatar_url": "https://avatars2.githubusercontent.com/u/1459126?v=4",
      "gravatar_id": "",
      "url": "https://api.github.com/users/estringana",
      "html_url": "https://github.com/estringana",
      "followers_url": "https://api.github.com/users/estringana/followers",
      "following_url": "https://api.github.com/users/estringana/following{/other_user}",
      "gists_url": "https://api.github.com/users/estringana/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/estringana/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/estringana/subscriptions",
      "organizations_url": "https://api.github.com/users/estringana/orgs",
      "repos_url": "https://api.github.com/users/estringana/repos",
      "events_url": "https://api.github.com/users/estringana/events{/privacy}",
      "received_events_url": "https://api.github.com/users/estringana/received_events",
      "type": "User",
      "site_admin": false
    },
    "truncated": false
  }
]
RESPONSE;
        $existingUsername = 'estringana';
        $client = getClientWithResponses([new Response(200, [], $gistResponse)]);

        $gistService = new GistService($existingUsername, $client);
        $collection = $gistService->getAll();

        $this->assertInstanceOf(GistCollection::class, $collection);
        $this->assertCount(3, $collection);
    }

    public function test_exception_is_thrown_when_username_not_found()
    {
        $client = getClientWithResponses([new Response(404, [])]);
        $nonExistingUsername = 'not-existing-username';
        $isExceptionThrown = false;

        try {
            $gistService = new GistService($nonExistingUsername, $client);
            $collection = $gistService->getAll();
        } catch (UserNotFoundException $exception) {
            $isExceptionThrown = true;
        }

        $this->assertTrue($isExceptionThrown);
    }

    public function test_we_get_the_urls_of_the_gists_retrieved()
    {
        $url01 = 'url01';
        $url02 = 'url02';
        $gistResponse = sprintf('[{"url": "%s"},{"url": "%s"}]', $url01, $url02);
        $client = getClientWithResponses([new Response(200, [], $gistResponse)]);

        $gistService = new GistService('existingUser', $client);
        $collection = $gistService->getAll();
        $first = $collection[0];
        $second = $collection[1];

        $this->assertInstanceOf(Gist::class, $first);
        $this->assertEquals($url01, $first->getUrl());
        $this->assertInstanceOf(Gist::class, $second);
        $this->assertEquals($url02, $second->getUrl());
    }
}
