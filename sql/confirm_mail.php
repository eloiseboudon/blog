<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'connexion.php';

$bdd = connexion_sql();
$sql = "SELECT * FROM verifications JOIN membres ON verifications.id_membre=membres.id WHERE id_membre ='$user_id'";
$req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));
$user = mysqli_fetch_array($req);

session_start();

if ($user && $user['token'] == $token) {
    $sql2 = "UPDATE verifications SET confirmation_token=1, confirmed_at=NOW() WHERE id_membre='$user_id'";
    $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));
$email = $user['email'];

    $prenom = $user['prenom'];


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>". "\r\n";

    $message = '
            <html>
    <head>
        <title>Changement d\'adresse email effectué</title>
    </head>
    <body>
        <h1>Changement d\'adresse email effectué </h1>
        Bonjour '. $prenom .',<br />

Votre adresse email a été changée, voici la nouvelle : '. $email .'. <br /> 

A très bientôt ! <br />

L’équipe L’étiquette <br />

Si les liens ne fonctionnent pas, copiez-collez les dans la barre de navigation de votre navigateur. <br />
Merci de ne pas répondre à ce message. Si vous souhaitez nous <a href="http://www.letiquette-blog.com/contact">contacter</a>, utilisez le formulaire en ligne.

    </body>
    </html>';



    mail($email, "Modification de l'adresse email", $message, $headers);

    $_SESSION['user'] = $user;

    header('Location: ../index.php');
    exit();
} else {
    $_SESSION['flash']['error'] = "La modification n'a pas fonctionné, veuillez nous contacter";
    header('Location: ../index.php');
    exit();
}