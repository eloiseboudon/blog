<?php
session_start();

$_SESSION = array();

session_destroy();
setcookie('pseudo',null,  time() - 365*24*3600, "/", null, false, true );
setcookie('password',null,  time() - 365*24*3600, "/", null, false, true );
setcookie('nbPages',null,  time() - 365*24*3600, "/", null, false, true );
setcookie('nbArticles',null,  time() - 365*24*3600, "/", null, false, true );
header('location: ../index.php');

exit;
?>