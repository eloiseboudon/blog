<?php

require 'connexion.php';
session_start();


if (isset($_POST['email']) && isset($_SESSION['user']['id'])) {

    $email = $_POST['email'];
    $user_id = $_SESSION['user']['id'];
    $token = str_random(60);
    $_SESSION['token'] = $token;

    $bdd = connexion_sql();


    $sql = "UPDATE membres SET email = '$email' WHERE id='$user_id'";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));


    $sql2 = "UPDATE verifications SET token='$token', confirmation_token = null, confirmed_at = null WHERE id_membre='$user_id'";
    $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
//    echo $email;
//    echo "<br />";
//
//    echo $sql;


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>" . "\r\n";

    $message = '<html>
    <head>
        <title>Veuillez confirmer votre e-mail</title>
    </head>
    <body>
        <h1>Confirmation adresse email</h1>
        Bonjour ' . $prenom . ',<br />

Pour valider votre modificaton d’adresse email, veuillez cliquer sur le lien ci-dessous :<br />

http://letiquette-blog.com/sql/confirm_mail.php?id=' . $user_id . '&token=' . $token . '<br />

Merci et à très bientôt !<br />

L’équipe L’étiquette<br />

Merci de ne pas répondre à ce message. Si vous souhaitez nous <a href="http://www.letiquette-blog.com/index.php?page=contact">contacter</a>, utilisez le formulaire en ligne.

    </body>
    </html>';


    if (mail($email, 'Confirmation de modification de votre adresse email', $message, $headers)) {
        $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte.';
    } else {
        $_SESSION['flash']['error'] = "Une erreur a eu lieu durant l'envoi du mail veuillez nous <a href=\"../index.php?page=contact\">contacter</a> s'il vous plait.";
    }

    header('location:../index.php');
    exit();

}