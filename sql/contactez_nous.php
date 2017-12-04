<?php


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    $to = "boudon.eloise@gmail.com";
    $subject = "Blog [Contactez-nous]";

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $demande = $_POST['demande'];
    $commentaire = $_POST['commentaire'];

    $message = "$nom $prenom à envoyé un mail depuis cette adresse : $email, concernant : '$demande'. 
    Voici la demande : '$commentaire'";

    $headers = 'From: ne-pas-repondre@letiquette-blog.com';

    session_start();
    if (mail($to, utf8_decode($subject), utf8_decode($message), $headers)) {
        $_SESSION['flash']['success'] = "Merci pour votre message ! Nous reviendrons vers vous dans les plus brefs délais.";
        header('location: ../index.php');
        exit();
    } else {
        $_SESSION['flash']['error'] = "Une erreur est survenue, votre message n'a pas été envoyé, merci de bien vouloir réessayer.";
        header('location: ../index.php?page=contact');
        exit();
    }

}