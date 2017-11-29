<?php
include_once 'vendor/autoload.php';

const CLIENT_ID = '121564257068-dsfqbu2qnc0m38rmg7mc0lbadbnk4ogf.apps.googleusercontent.com';
const CLIENT_SECRET = 'GN8ZlJ4sQJbLYAiIIsaKnUhS';
const REDIRECT_URL = 'http://localhost/blog/';


$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URL);
$client->addScope('https://mail.google.com');

$google_oauthV2 = new Google_Service_Oauth2($client);

?>