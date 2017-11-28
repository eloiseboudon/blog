<?php

require 'connexion.php';
if (isset($_COOKIE['pseudo']) && isset($_COOKIE['password'])) {

    $pseudo = $_COOKIE['pseudo'];
    $password = $_COOKIE['password'];

    $bdd = connexion_sql();
    $sql = "SELECT id from membres WHERE pseudo = '$pseudo' AND password = '$password'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $user = mysqli_fetch_array($req);

    if (!$user) {
        echo'<meta http-equiv="refresh" content="0;../index.php?page=3" />';
    } else {
        session_start();
        $_SESSION['user'] = $user;
        setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");
        header('location:../index.php');
        exit();
    }
}
else{
    echo'<meta http-equiv="refresh" content="0;../index.php?page=3" />';
}

?>