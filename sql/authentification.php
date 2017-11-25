<?php

require'connexion.php';


if (isset($_POST['pseudo']) && isset($_POST['password'])) {

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];


    $bdd = connexion_sql();
    $sql = "SELECT *  from membres WHERE pseudo = '$pseudo'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $user = mysqli_fetch_array($req);

    if(password_verify($password, $user['password'])){
        session_start();
        if($user['confirmation_token']==1) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $user['email'];
            $_SESSION['flash']['success-connexion'] = "Vous êtes connecté.";
            header('location: ../index.php');
            setcookie('isConnect', 1);
        }else{
            $_SESSION['flash']['error-connexion'] = "Veuillez confirmer votre inscription en cliquant sur le lien envoyé par mail.";
            header('location: ../index.php?page=3');
        }
        exit();
    } else {
        session_start();
        $_SESSION['flash']['error-connexion'] = "Pseudo ou mot de passe erroné.";
        header('location: ../index.php?page=3');
    }

} else {
    header('location: ../index.php?page=3');
    exit();
}

?>