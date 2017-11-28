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
            $_SESSION['user'] = $user;
            $_SESSION['flash']['success'] = "Vous êtes connecté.";
            header('location: ../index.php');
            setcookie('isConnect', 1);
        }else{
            $_SESSION['flash']['error'] = "Veuillez confirmer votre inscription en cliquant sur le lien envoyé par mail. <br />
           Vous n'avez pas recu de mail,<a onclick=\"envoi_token()\">Veuillez cliquer ici pour en recevoir un nouveau</a>,s'il vous plait.";
            header('location: ../index.php?page=3');
        }
        exit();
    } else {
        session_start();
        $_SESSION['flash']['error'] = "Pseudo ou mot de passe erroné.";
        header('location: ../index.php?page=3');
    }

} else {
    header('location: ../index.php?page=3');
    exit();
}



function envoi_token(){
session_start();
    $email = $_SESSION['mail'];
    $token = $_SESSION['token'];
    $user_id = $_SESSION['user_id'];
    $headers = 'From: letiquette@letiquette-blog.com';

    mail($email, 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien http://letiquette-blog.com/sql/confirm.php?id=$user_id&token=$token", $headers);

}
?>