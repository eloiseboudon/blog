<?php

require 'connexion.php';
if (isset($_COOKIE['pseudo'])) {

    $pseudo = $_COOKIE['pseudo'];

    $bdd = connexion_sql();
    $sql = "SELECT * from membres WHERE pseudo = '$pseudo'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $user = mysqli_fetch_array($req);

    if (!$user) {
        echo'<meta http-equiv="refresh" content="0;../index.php?page=3" />';
    } else {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['auto_log'] = "oui";
        setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");
        header('location:../index.php');
        exit();
    }
}
else{
    echo'<meta http-equiv="refresh" content="0;../index.php?page=3" />';
}

?>