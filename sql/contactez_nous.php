<?php


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    $to = "contact@letiquette-shop.com";


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $demande = $_POST['demande'];
    $commentaire = $_POST['commentaire'];


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: L'étiquette <ne-pas-repondre@letiquette-blog.com>". "\r\n";


    $subject = "Blog [Contactez-nous] - ". $demande ;
    $message = "$nom $prenom à envoyé un mail depuis cette adresse : $email, concernant : '$demande'.  <br />
    Voici la demande : '$commentaire'";


    $subject_contact = $prenom . ', merci pour votre message !';

    $message_contact = "
            <html>
    <head>
        <title>Merci pour votre message</title>
    </head>
    <body>
        <h1>Merci de nous avoir rejoint ! </h1>
        Bonjour $prenom,<br />

Votre message a bien été envoyé. Pour rappel, vous nous avez écrit : <br />$commentaire <br />
Nous reviendrons vers vous dans les plus brefs délais.  <br />
A très bientôt !<br />
L’équipe L’étiquette<br />
Merci de ne pas répondre à ce message. Si vous souhaitez nous <a href=\"http://www.dev.letiquette-blog.com/contact\">contacter</a>, utilisez le formulaire en ligne.

    </body>
    </html>";

    session_start();
    if (mail($to, $subject, $message, $headers) && mail($email, $subject_contact, $message_contact, $headers)) {
        $_SESSION['flash']['success'] = "Merci pour votre message ! Nous reviendrons vers vous dans les plus brefs délais.";
        header('location: ../accueil');
        exit();
    } else {
        $_SESSION['flash']['error'] = "Une erreur est survenue, votre message n'a pas été envoyé, merci de bien vouloir réessayer.";
        header('location: ../contact');
        exit();
    }

}