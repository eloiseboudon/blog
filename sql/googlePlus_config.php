<?php
include_once '../vendor/autoload.php';


session_start();

//Include Google client library
include_once '../vendor/google/apiclient/src/Google/Client.php';
include_once '../vendor/google/apiclient-services/src/Google/Service/Oauth2.php';


/*
 * Configuration and setup Google API
 */
$clientId = 'GN8ZlJ4sQJbLYAiIIsaKnUhS';
$clientSecret = 'GN8ZlJ4sQJbLYAiIIsaKnUhS';
$redirectURL = 'http://localhost/blog/sql/login_with_google.php';

//Call Google API
$gClient = new Google_Client();
//$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Service_Oauth2($gClient);
?>