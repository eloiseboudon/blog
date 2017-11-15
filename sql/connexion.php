<?php



function connexion_sql()
{

//    LOCAL
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "blog";

//	SERVEUR

//    $servername = 'db700408713.db.1and1.com';
//    $database = 'db700408713';
//    $username = 'dbo700408713';
//    $password = "L3ttiqu3tt3%";

	$db = mysqli_connect($servername, $username, $password, $database)
		or die("Impossible de se connecter : " . mysqli_error($db));

	mysqli_set_charset($db, 'UTF8');

		return $db;
}
?>