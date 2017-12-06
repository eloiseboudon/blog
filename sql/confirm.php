<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'connexion.php';

$bdd = connexion_sql();
$sql = "SELECT * FROM verifications WHERE id_membre ='$user_id'";

$req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

$user = mysqli_fetch_array($req);

session_start();

if ($user && $user['token'] == $token) {
    $sql2 = "UPDATE verifications SET confirmation_token=1, confirmed_at=NOW() WHERE id_membre='$user_id'";
    $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $_SESSION['connexion'] = "en cours";
    $_SESSION['flash']['success'] = 'Merci d\'avoir validé votre compte, vous pouvez maintenant commenter les articles.';
    $_SESSION['user'] = $user;

    header('Location: ../index.php?page=3');
    exit();
} else {
    $_SESSION['flash']['error'] = "La validation n'a pas fonctionné, veuillez nous contacter";
    header('Location: ../index.php');
    exit();
}