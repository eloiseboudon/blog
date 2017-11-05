<?php


function connexion_sql()
{
	$servername = "localhost";
	$username = "root";
	$password = "";


	$db = mysqli_connect($servername, $username, $password, 'blog')
		or die("Impossible de se connecter : " . mysqli_error($db));

		return $db;
}


?>