<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 24/11/2017
 * Time: 15:42
 */


require 'connexion.php';

if(!empty($_POST) && !empty($_POST['email'])){

    $email=$_POST['email'];

    $bdd = connexion_sql();
    $sql = "SELECT * FROM membres WHERE email='$email'";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
    $user = mysqli_fetch_array($req);
    $user_id = $user['id'];

    if($user){
        session_start();
        $reset_token = str_random(60);

        $sql2 = "UPDATE membres SET token='$reset_token', confirmation_token=null, confirmed_at=null WHERE id='$user_id'";
        $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
        $_SESSION['flash']['success-connexion'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
        mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://letiquette-shop.com/blog/sql/reset.php?id={$user_id}&token=$reset_token");
        header('Location: ../index.php?page=3');
        exit();
    }else{
        $_SESSION['flash']['error-user'] = 'Aucun compte ne correspond à cet adresse';
        header('Location: ../index.php?page=5');
        exit();
    }

}