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

    $_SESSION['connexion'] = "en cours";
    $_SESSION['flash']['success'] = 'Merci d\'avoir validé votre compte, vous pouvez maintenant commenter les articles.';
    $email = $user['email'];
    $prenom = $user['prenom'];
    $sexe = $user['sexe'];
    $pseudo = $user['pseudo'];

    switch ($sexe){
        case "F":
            $pret_sexe = "prête";
            break;
        case "M":
            $pret_sexe ="prêt";
            break;
        case"N":
            $pret_sexe="prêt•e";
            break;
    }


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>". "\r\n";

    $message = '
            <html>
    <head>
        <title>Bienvenue chez L\'étiquette</title>
    </head>
    <body>
        <h1>Merci pour votre inscription ! </h1>
        Bonjour '. $prenom .',<br />

Votre inscription est maintenant validée. <br />
Merci de nous avoir fait l’immense honneur de nous rejoindre ! Nous avons hâte de vous faire découvrir notre univers. Ensemble, nous allons changer le monde '. $prenom .'.<br />

Vous êtes '. $pret_sexe .' ? Alors cliquez sur le <a href="http://letiquette-blog.com/index.php">lien</a> ci-dessous !<br />

Pour rappel, votre identifiant est : '. $email .' et le pseudo que vous avez choisi est : '. $pseudo .'. Vous seul connaissez votre mot de passe. 
Conservez vos identifiants pour accéder à votre compte.
 <br />

A très bientôt ! <br />

L’équipe L’étiquette <br />

Si les liens ne fonctionnent pas, copiez-collez les dans la barre de navigation de votre navigateur. <br />
Merci de ne pas répondre à ce message. Si vous souhaitez nous <a href="http://www.letiquette-blog.com/contact">contacter</a>, utilisez le formulaire en ligne. 

    </body>
    </html>';

    mail($email, "Bienvenue chez L'étiquette ! ", $message, $headers);

    $_SESSION['connexion'] = "confirm";
    $_SESSION['user'] = $user;

    header('Location: ../index.php');
    exit();
} else {
    $_SESSION['flash']['error'] = "La validation n'a pas fonctionné, veuillez nous contacter";
    header('Location: ../index.php');
    exit();
}