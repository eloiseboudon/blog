<?php

session_start();
$_SESSION = array();
session_destroy();
session_start();
$_SESSION['flash']['success'] = "Vous êtes déconnecté.";
setcookie('isConnect', 3);
header('location: ../index.php');
exit();

?>