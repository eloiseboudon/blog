<?php

function connexion_sql(){

//    LOCAL
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "blog";

//	SERVEUR

//    $servername = 'letiqueteheloise.mysql.db';
//    $database = 'letiqueteheloise';
//    $username = 'letiqueteheloise';
//    $password = "L3tiqu3tt3";

	$db = mysqli_connect($servername, $username, $password, $database)
		or die("Impossible de se connecter : " . mysqli_error($db));

	mysqli_set_charset($db, 'UTF8');

		return $db;
}


function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

?>