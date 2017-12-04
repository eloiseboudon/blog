<?php

require 'connexion.php';


if (isset($_POST['login']) && isset($_POST['password'])) {



    $login = $_POST['login'];
    $password = $_POST['password'];


    echo $login;

    $bdd = connexion_sql();

    $req_if_mail = $bdd->query("SELECT COUNT(*) as count FROM membres WHERE email='$login'");
    $if_email = mysqli_fetch_array($req_if_mail);
    $count_if_email = $if_email['count'];

    $req_pseudo = $bdd->query("SELECT COUNT(*) as count FROM membres WHERE pseudo='$login'");
    $if_req_pseudo= mysqli_fetch_array($req_pseudo);
    $count_if_req_pseudo= $if_req_pseudo['count'];

    echo $count_if_req_pseudo;

    echo $count_if_email;

    if($count_if_email == 0 && $count_if_req_pseudo == 0 ) {
        session_start();
        $_SESSION['flash']['error'] = "Login inéxistant.";
        header('location: ../index.php?page=3');
        exit();
    }else{
        if ($count_if_email != 0) {
            $sql = "SELECT *  from membres WHERE email = '$login'";
        } elseif ($count_if_req_pseudo != 0) {
            $sql = "SELECT *  from membres WHERE pseudo = '$login'";
        }

        $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

        $user = mysqli_fetch_array($req);

        if (password_verify($password, $user['password'])) {
            session_start();
            if ($user['confirmation_token'] == 1) {
                $_SESSION['user'] = $user;
                $_SESSION['connexion'] = "site";
                $_SESSION['flash']['success'] = "Vous êtes connecté.";
                setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");
                header('location: ../index.php');
                exit();

            } else {
                $_SESSION['flash']['error'] = "Veuillez confirmer votre inscription en cliquant sur le lien envoyé par mail.";
                header('location: ../index.php?page=3');
                exit();
            }
        } else {
            session_start();
            $_SESSION['flash']['error'] = "Pseudo ou mot de passe erroné.";
            header('location: ../index.php?page=3');
            exit();
        }
    }

} else {
    header('location: ../index.php?page=3');
    exit();
}


function envoi_token(){

    echo "<script>alert('test');</script>";

    session_start();
    $email = $_SESSION['mail'];
    $token = $_SESSION['token'];
    $user_id = $_SESSION['user_id'];
    $headers = "From: L'etiquette <ne-pas-repondre@letiquette-blog.com>";

    mail($email, 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien http://letiquette-blog.com/sql/confirm.php?id=$user_id&token=$token", $headers);

}

?>