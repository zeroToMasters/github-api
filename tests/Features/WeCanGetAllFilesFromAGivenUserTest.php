<?php

namespace Tests\Features;

use PHPUnit\Framework\TestCase;
use App\GistService;
use App\Dtos\FilesCollection;
use App\Dtos\File;
use GuzzleHttp\Psr7\Response;

class WeCanGetAllFilesFromAGivenUserTest extends TestCase
{
    public function test_we_can_get_all_files_of_a_given_user()
    {
        $gistResponse = <<<RESPONSE
[
  {
    "url": "https://api.github.com/gists/someGist01",    
    "files": {
      "SomeFile01.php": {
        "filename": "SomeFile01.php"
      }
    }    
  },
  {
    "url": "https://api.github.com/gists/someGist02",    
    "files": {
      "SomeFile02.php": {
        "filename": "SomeFile02.php"
      },
      "SomeFile03.php": {
        "filename": "SomeFile03.php"
      }
    }    
  } 
]
RESPONSE;
        $client = getClientWithResponses([new Response(200, [], $gistResponse)]);

        $gistService = new GistService('existingUser', $client);
        $gistCollection = $gistService->getAll();
        $filesCollection = $gistCollection->getFiles();

        $this->assertInstanceOf(FilesCollection::class, $filesCollection);
        $this->assertCount(3, $filesCollection);
    }

    public function test_we_get_the_filenames_of_the_files_retrieved()
    {
        $filename = 'fileOnGist.php';
        $gistTemplate = <<<RESPONSE
[
  {
    "url": "Some url",    
    "files": {
      "%s": {
        "filename": "%s"
      }
    }    
  }
]
RESPONSE;
        $gistResponse = sprintf($gistTemplate, $filename, $filename);
        $client = getClientWithResponses([new Response(200, [], $gistResponse)]);

        $gistService = new GistService('existingUser', $client);
        $gistCollection = $gistService->getAll();
        $filesCollection = $gistCollection->getFiles();

        $firstFile = $filesCollection[0];

        $this->assertInstanceOf(File::class, $firstFile);
        $this->assertEquals($filename, $firstFile->getFilename());
    }
}
