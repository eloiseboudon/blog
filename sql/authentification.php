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
        header('location: ../authentification');
        exit();
    }else{
        if ($count_if_email != 0) {
            $sql = "SELECT *  from membres WHERE email = '$login'";
        } elseif ($count_if_req_pseudo != 0) {
            $sql = "SELECT *  from membres WHERE pseudo = '$login'";
        }

        $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

        $user = mysqli_fetch_array($req);
        $user_id = $user['id'];

        $sql2 = "SELECT * FROM verifications WHERE id_membre = '$user_id'";
        $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));
        $user_confirm = mysqli_fetch_array($req2);

        if (password_verify($password, $user['password'])) {
            session_start();
            if ($user_confirm['confirmation_token'] == 1) {

                $sql3 = "UPDATE verifications SET derniere_connexion = NOW() WHERE id_membre ='$user_id'";
                $req3 = $bdd->query($sql3) or die ('Erreur SQL : ' . mysqli_error($bdd));

                $_SESSION['user'] = $user;
                $_SESSION['connexion'] = "site";
                $_SESSION['flash']['success'] = "Vous êtes connecté.";
                setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");
                header('location: ../accueil');
                exit();

            } else {
                $_SESSION['flash']['error'] = "Veuillez confirmer votre inscription en cliquant sur le lien envoyé par mail.";
                header('location: ../authentification');
                exit();
            }
        } else {
            session_start();
            $_SESSION['flash']['error'] = "Pseudo ou mot de passe erroné.";
            header('location: ../authentification');
            exit();
        }
    }

} else {
    header('location: ../authentification');
    exit();
}

?>