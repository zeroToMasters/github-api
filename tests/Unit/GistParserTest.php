<?php

namespace App;

use PHPUnit\Framework\TestCase;

class GistParserTest extends TestCase
{
    /** @test */
    public function it_parses_a_single_gist_into_a_gist_collection()
    {
        $gistJson = <<<GIST
[
  {
    "url": "https://api.github.com/gists/0bb8435a0f595e14a6be2ef1f20ae210",
    "forks_url": "https://api.github.com/gists/0bb8435a0f595e14a6be2ef1f20ae210/forks",
    "commits_url": "https://api.github.com/gists/0bb8435a0f595e14a6be2ef1f20ae210/commits",
    "id": "0bb8435a0f595e14a6be2ef1f20ae210",
    "git_pull_url": "https://gist.github.com/0bb8435a0f595e14a6be2ef1f20ae210.git",
    "git_push_url": "https://gist.github.com/0bb8435a0f595e14a6be2ef1f20ae210.git",
    "html_url": "https://gist.github.com/0bb8435a0f595e14a6be2ef1f20ae210",
    "files": {
      "Test": {
        "filename": "Test",
        "type": "text/plain",
        "language": null,
        "raw_url": "https://gist.githubusercontent.com/estringana/0bb8435a0f595e14a6be2ef1f20ae210/raw/b78e300b23a8d2be3aa7d7380e8147d3364a3681/Test",
        "size": 23
      }
    },
    "public": true,
    "created_at": "2018-04-15T12:14:58Z",
    "updated_at": "2018-04-15T12:17:40Z",
    "description": "This is my description",
    "comments": 0,
    "user": null,
    "comments_url": "https://api.github.com/gists/0bb8435a0f595e14a6be2ef1f20ae210/comments",
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
GIST;
;
        $parser = new GistParser();

        $this->assertInstanceOf(GistCollection::class, $parser->parse($gistJson));
        $this->assertCount(1, $parser->parse($gistJson));
    }
}
