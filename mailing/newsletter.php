<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 11/12/2017
 * Time: 14:59
 */


require '../sql/connexion.php';

$bdd = connexion_sql();

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>" . "\r\n";

$date = date("d/m/Y");

echo "Non membres: <br />";
//adresses email non membres
$sql = "SELECT email, prenom FROM mail WHERE newsletter=1 and id_membre = 0";
$req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
while ($donnees = mysqli_fetch_array($req)) {
    $email = $donnees['email'];
    $prenom = $donnees['prenom'];
    $objet = "Newsletter de L'etiquette du $date";

    $message = '<html>
    <head>
        <title>Newsletter</title>
    </head>
    <body>
               <h1>Merci pour votre inscription ! </h1>
        Bonjour '. $prenom .',<br />


news
    </body>
    </html>';


    if (mail($email, $objet, $message, $headers)) {
        echo $email;
        echo "<br />";
    }
}

echo "Membres: <br />";
//adresse email membres
$sql2 = "SELECT membres.email, membres.prenom FROM mail JOIN membres ON mail.id_membre=membres.id WHERE newsletter=1 AND id_membre <> 0";
$req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
while ($donnees2 = mysqli_fetch_array($req2)) {
    $email = $donnees2['email'];
    $prenom = $donnees2['prenom'];


    $objet = "Newsletter de L'etiquette du $date test $prenom";
    $message = '<html>
    <head>
        <title>Newsletter</title>
    </head>
    <body>
         <h1>Merci pour votre inscription ! </h1>
        Bonjour '. $prenom .',<br />


news
    </body>
    </html>';


    if (mail($email, $objet, $message, $headers)) {
        echo $email;
        echo "<br />";
    }
}




