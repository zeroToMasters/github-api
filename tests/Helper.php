<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

function getClientWithResponses(array $reponses): Client
{
	$mock = new MockHandler($reponses);

    $handler = HandlerStack::create($mock);
    return new Client(['handler' => $handler]);
}
