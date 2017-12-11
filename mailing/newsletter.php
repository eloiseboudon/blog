<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 11/12/2017
 * Time: 14:59
 */


require '../sql/connexion.php';

$liste = '';
$liste2 = '';

$bdd = connexion_sql();

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>" . "\r\n";
//$headers .= 'Bcc:' . $liste . '' . "\r\n";


$date = date("d/m/Y");

 // On définit l'objet qui contient la date.

//adresses email non membre
$sql = "SELECT email, prenom FROM mail WHERE newsletter=1 and id_membre = 0";
$req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
while ($donnees = mysqli_fetch_array($req)) {
//    $liste .= ',';
//    $liste .= $donnees['email'];
    $prenom = $donnees['prenom'];
    $objet = "Newsletter de L'etiquette du $date";

    $message = '<html>
    <head>
        <title>Newsletter/title>
    </head>
    <body>
        <h1>Voici la nouvelle Newsletter, Enjoy it !  </h1>
Bonjour '. $prenom .'

    </body>
    </html>';


    if (mail($liste, $objet, $message, $headers)) {
        echo "Envoyé";
    }
}


//adresse email membres
$sql2 = "SELECT membres.email, membres.prenom FROM mail JOIN membres ON mail.id_membre=membres.id WHERE newsletter=1 AND id_membre <> 0";
$req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
while ($donnees2 = mysqli_fetch_array($req2)) {
//    $liste2 .= ',';
//    $liste2 .= $donnees2['email'];
    if ($donnees['prenom'] == null) {
        $prenom = $donnees2['prenom'];
    }

    $objet = "Newsletter de L'etiquette du $date test $prenom";
    $message = '<html>
    <head>
        <title>Newsletter/title>
    </head>
    <body>
        <h1>Voici la nouvelle Newsletter, Enjoy it !  </h1>
Bonjour '. $prenom .'

    </body>
    </html>';


    if (mail($liste2, $objet, $message, $headers)) {
        echo "Envoyé";
    }
}




