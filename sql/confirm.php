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


$_SESSION['success-connexion']='Votre compte a bien été validé';
    $_SESSION['id'] = $user['id'];
    $_SESSION['pseudo'] = $user['pseudo'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['email'] = $user['email'];
header('Location: ../index.php?page=3');
    exit();
}else{
    $_SESSION['error-confirmation']= "La validation n'a pas fonctionné, veuillez nous contacter";
header('Location: ../index.php');
    exit();
}