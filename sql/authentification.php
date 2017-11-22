<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 16/11/2017
 * Time: 15:07
 */
include('connexion.php');


if (isset($_GET['pseudo']) && isset($_GET['password'])) {

    $pseudo = $_GET['pseudo'];
//    $password = sha1($_GET['password']);
    $password = $_GET['password'];


    $bdd = connexion_sql();
    $sql = "SELECT id,email  from membres WHERE pseudo = '$pseudo' AND password = '$password'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $resultat = mysqli_fetch_array($req);


    if (!$resultat) {
        session_start();
        $_SESSION['erreur_authentification'] = "Pseudo ou mot de passe erroné.";

        header('location: ../index.php?page=3');
    } else {
        session_start();

        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['erreur_authentification'] = "Vous êtes connecté.";

        setcookie('isConnect', 1);
        header('location: ' . $_SESSION['page_prec']);
    }

} else {
    header('location: ../index.php?page=3');
}

?>