<?php

session_start();

//Include Configuration File
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('881013621834-k35cnrsa03f2b1qfkv851src73l4fdce.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/PrePlaced/login/signup.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>