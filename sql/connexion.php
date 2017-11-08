<?php



function connexion_sql()
{
	$servername = "localhost";
	$username = "root";
	$password = "";

	$db = mysqli_connect($servername, $username, $password, 'blog')
		or die("Impossible de se connecter : " . mysqli_error($db));

	mysqli_set_charset($db, 'UTF8');

		return $db;

}


?>