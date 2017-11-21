<?php

include('sql/connexion.php');
if (isset($_COOKIE['pseudo']) && isset($_COOKIE['password'])) {

    $pseudo = $_COOKIE['pseudo'];
    $password = $_COOKIE['password'];

//        $pass_hache = sha1($_POST['password']);

    $bdd = connexion_sql();
    $sql = "SELECT id from membres WHERE pseudo = '$pseudo' AND password = '$password'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $resultat = mysqli_fetch_array($req);


    if (!$resultat) {
        echo'<meta http-equiv="refresh" content="0;../index.php?page=3" />';
    } else {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['password'] = $password;


        header('location:index.php');
    }

}
else{
    echo'<meta http-equiv="refresh" content="0;../index.php?page=3" />';
}

?>