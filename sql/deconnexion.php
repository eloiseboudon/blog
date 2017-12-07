<?php
require_once '../vendor/autoload.php';
session_start();

if($_SESSION['connexion'] == "site"){
    $_SESSION = array();
}elseif($_SESSION['connexion'] == "google"){

    $accesstoken = $_SESSION['access_token'];

    unset($_SESSION['access_token']);
    unset($_SESSION['user']);

    $client = new Google_Client();
    $client->setClientId(CLIENT_ID);
    $client->setClientSecret(CLIENT_SECRET);
    $client->setRedirectUri(REDIRECT_URL);
    $client->revokeToken($accesstoken);
}


session_destroy();
session_start();
$_SESSION['flash']['success'] = "Vous êtes déconnecté.";

setcookie('isConnect', 3, time() + 365 * 24 * 3600, "/");
header('location: ../index.php');
exit();

?>