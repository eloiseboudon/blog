<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'connexion.php';

$bdd = connexion_sql();
$sql = "SELECT * FROM membres WHERE id ='$user_id'";

$req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

$user = mysqli_fetch_array($req);

session_start();

if($user && $user['token'] == $token ){
    $sql2 = "UPDATE membres SET confirmation_token=1, confirmed_at=NOW() WHERE id='$user_id'";
    $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));


$_SESSION['flash']['success'] = 'Votre compte a bien été validé';
$_SESSION['auth'] = $user;
header('Location: ../index.php?page=3');
}else{
$_SESSION['flash']['danger'] = "Ce token n'est plus valide";
header('Location: ../index.php?page=4.php');
}