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

    $subject = 'test';


    $message= " test";

    $headers = 'From: ne-pas-repondre@letiquette-blog.com';

    while ($donnees = mysqli_fetch_array($req)) {
        $to = "boudon.eloise@gmail.com";
        if (mail($to, $subject, $message, $headers)) {
            array_push($array_envoi, $to, "<br />");
        } else {
            array_push($array_non_envoi, $to, "<br />");
        }
    }
//    echo "Mail envoyé à : <br /> ";
//    foreach ($array_envoi as $item) {
//        echo $item;
//    }
//
//echo "<br /> Mail non envoyé à : <br />";
//    echo "\n";
//    foreach ($array_non_envoi as $item) {
//        echo $item;
//    }

}

?>



