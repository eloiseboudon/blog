<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 16/11/2017
 * Time: 15:07
 */
include('connexion.php');

if (isset($_GET['pseudo'])) {
    $pseudo = $_GET['pseudo'];
    $password = $_GET['password'];

//        $pass_hache = sha1($_POST['password']);

    $bdd = connexion_sql();
    $sql = "SELECT id from membres WHERE pseudo = '$pseudo' AND password = '$password'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $resultat = mysqli_fetch_array($req);


        if (!$resultat) {
            echo 'Mauvais identifiant ou mot de passe !';
        } else {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
        }

}
else{
    echo "coucou";
}