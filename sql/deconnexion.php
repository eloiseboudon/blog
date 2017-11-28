<?php

session_start();
$_SESSION = array();
session_destroy();
session_start();
$_SESSION['flash']['success'] = "Vous êtes déconnecté.";

setcookie('isConnect', 3, time() + 365 * 24 * 3600, "/");
header('location: ../index.php');
exit();

?>