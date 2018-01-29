<?php

require 'connexion.php';

if (isset($_POST['id']) && isset($_POST['token'])) {
    session_start();
    $user_id = $_POST['id'];
    $token = $_POST['token'];

    $bdd = connexion_sql();
    $sql = "SELECT * FROM verifications WHERE id_membre='$user_id' AND token = '$token' AND confirmed_at > DATE_SUB(NOW(), INTERVAL  30 MINUTE)";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
    $user = mysqli_fetch_array($req);

    if ($user) {
        if (!empty($_POST)) {
            if (isset($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $bdd = connexion_sql();
                $sql2 = "UPDATE verifications SET confirmation_token=1, confirmed_at=NOW() WHERE id_membre='$user_id'";
                $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));

                $sql3 = "UPDATE membres SET password='$password' WHERE id='$user_id'";
                $req3= $bdd->query($sql3) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));

                session_start();
                $_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié.';
                $_SESSION['auth'] = $user;
                $_SESSION['connexion']="reset";
                header('Location: ../authentification');
                exit();
            } else {
                session_start();
                $_SESSION['flash']['error'] = "Ce token n'est pas valide.";
                header('Location: ../index.php');
                exit();
            }
        }

    } else {
        session_start();
        $_SESSION['flash']['error'] = "Une erreur à eu lieu, veuillez recommencer s'il vous plait.";
        header('Location: ../forget_password');
        exit();
    }
}
?>