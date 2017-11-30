<?php

envoi_mail();


function connexion_sql()
{
    $servername = 'letiqueteheloise.mysql.db';
    $database = 'letiqueteheloise';
    $username = 'letiqueteheloise';
    $password = "L3tiqu3tt3";

    $db = mysqli_connect($servername, $username, $password, $database)
    or die("Impossible de se connecter : " . mysqli_error($db));

    mysqli_set_charset($db, 'UTF8');

    return $db;
}

function envoi_mail()
{
    $array_envoi = array();
    $array_non_envoi = array();
    $bdd = connexion_sql();
    $sql = 'SELECT * FROM mail JOIN  membres ON mail.id_membre = membres.id WHERE prochain_article = 1';
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $subject = 'testé';


    $message= " Ceci est le premier article d'une longue suite sans fin.
    None je déconne j'en sais rien je suis qu'une quichasse qui fait des mails.
    Justine love U <4 ";

    $headers = 'From: ne-pas-repondre@letiquette-blog.com';
    $headers .= "Content-Type: text/html; charset=utf-8 ";

    while ($donnees = mysqli_fetch_array($req)) {
        $to = $donnees['email'];
        if (mail($to, utf8_decode($subject), utf8_decode($message), $headers)) {
            array_push($array_envoi, $to, "<br />");
        } else {
            array_push($array_non_envoi, $to, "<br />");
        }
    }
    echo "Mail envoyé à : <br /> ";
    foreach ($array_envoi as $item) {
        echo $item;
    }

echo "<br /> Mail non envoyé à : <br />";
    echo "\n";
    foreach ($array_non_envoi as $item) {
        echo $item;
    }

}

?>



