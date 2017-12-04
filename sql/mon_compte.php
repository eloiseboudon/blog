<?php

require 'connexion.php';
session_start();


if (isset($_POST['email']) && isset($_SESSION['user']['id'])) {

    $email = $_POST['email'];
    $user_id = $_SESSION['user']['id'];
    $token = str_random(60);
    $_SESSION['token'] = $token;
    $headers = "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>";
    $bdd = connexion_sql();


    $sql = "UPDATE membres SET email = '$email', token='$token', confirmation_token = null, confirmed_at = null WHERE id='$user_id'";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));

    echo $email;
    echo "<br />";

    echo $sql;

    if (mail($email, 'Confirmation de modification de votre adresse email', "Afin de valider votre compte merci de cliquer sur ce lien http://letiquette-blog.com/sql/confirm.php?id=$user_id&token=$token", $headers)) {
        $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte.';
    } else {
        $_SESSION['flash']['error'] = "Une erreur a eu lieu durant l'envoi du mail veuillez nous <a href=\"../index.php?page=contact\">contacter</a> s'il vous plait.";
    }

    header('location:../index.php');
    exit();

}