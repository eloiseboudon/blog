<?php


if (isset($_POST['nom_entreprise']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    $to = "boudon.eloise@gmail.com";
    $subject = "Blog [Devenir vendeur]";


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

    $headers = 'From: Blog [Devenir vendeur]';

    session_start();
    if (mail($to, utf8_decode($subject), utf8_decode($message), $headers)) {
        $_SESSION['flash']['success'] = "Merci de votre interêt. Votre demande sera étudiée dans les plus bref délais";
        header('location: ../index.php');
        exit();
    } else {
        $_SESSION['flash']['error'] = "Veuillez nous excuser, une erreur a eu lieu. Le formualire ne s'est pas envoyé, veuillez le renvoyer.";
        header('location: ../index.php?page=devenir_vendeur');
        exit();
    }


}