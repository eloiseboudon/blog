<?php



function connexion_sql(){

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




function connecion_utilisateur(){
    if (isset($_GET['submit'])) {
        $password = $_POST['password'];
        $pass_hache = sha1($_POST['password']);

        $bdd = connexion_sql();
        $sql = "SELECT id from membres WHERE pseudo = '$pseudo' AND password = '$password'";

        $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

        $resultat = mysqli_fetch_array($req);
        echo $resultat['id'];

        if (!$resultat) {
            echo 'Mauvais identifiant ou mot de passe !';
        } else {
//        session_start();
//        $_SESSION['id'] = $resultat['id'];
//        $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
        }

    }

}


?>