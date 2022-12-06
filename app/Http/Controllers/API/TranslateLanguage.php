<?php

use http\Client;
use Illuminate\Http\Request;

// $client = new Client;
// $request = new http\Client\Request;

// $body = new http\Message\Body;
$body = ('{"q":"Hello World!","source":"en","target":"es"}');

Request::setRequestUrl('https://deep-translate1.p.rapidapi.com/language/translate/v2');
Request::setRequestMethod('POST');
Request::setBody($body);

Request::setHeaders([
	'content-type' => 'application/json',
	'X-RapidAPI-Key' => '73378b18c9mshfce92a38975152dp1c713ajsnda716e5a2204',
	'X-RapidAPI-Host' => 'deep-translate1.p.rapidapi.com'
]);

Client::enqueue($request)->send();
$response = Client::getResponse();

echo $response->getBody();