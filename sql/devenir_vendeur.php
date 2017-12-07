<?php


if (isset($_POST['nom_entreprise']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    $to = "boudon.eloise@gmail.com";
    $subject = "Blog [Devenir vendeur]";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: L'étiquette <ne-pas-repondre@letiquette-blog.com>". "\r\n";


    $nom_entreprise = $_POST['nom_entreprise'];
    $siret = $_POST['siret'];
    $tva = $_POST['tva'];
    $site_internet = $_POST['site_internet'];

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $contenu= $_POST['message'];

    $message = "$nom $prenom de la marque $nom_entreprise à envoyé un message: $contenu.
    Entreprise : $nom_entreprise
    N° Siret : $siret
    N° TVA : $tva
    Site internet : $site_internet
    
    Contact : 
    Nom : $nom
    Prenom : $prenom
    Mail : $email
    Telephone : $telephone";



    $subject_contact = $prenom . ', merci pour votre message ! ';

    $message_contact = "
            <html>
    <head>
        <title>Merci pour votre message</title>
    </head>
    <body>
        <h1>Merci de nous avoir rejoint ! </h1>
        Bonjour $prenom,<br />

Votre message a bien été envoyé. Pour rappel, vous nous avez écrit : <br />$contenu <br />
Nous reviendrons vers vous dans les plus brefs délais.  <br />
A très bientôt !<br />
L’équipe L’étiquette<br />
Merci de ne pas répondre à ce message. Si vous souhaitez nous contacter, utilisez le formulaire en ligne : 
http://www.letiquette-blog.com/index.php?page=contact
    </body>
    </html>";


    session_start();
    if (mail($to, $subject, $message, $headers) && mail($email, $subject_contact, $message_contact, $headers)) {
        $_SESSION['flash']['success'] = "Merci pour votre message ! Nous reviendrons vers vous dans les plus brefs délais.";
        header('location: ../index.php');
        exit();
    } else {
        $_SESSION['flash']['error'] = "Une erreur est survenue, votre message n'a pas été envoyé, merci de bien vouloir réessayer.";
        header('location: ../index.php?page=devenir_vendeur');
        exit();
    }


}