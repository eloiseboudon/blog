<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 16/11/2017
 * Time: 15:07
 */
include('connexion.php');


if (isset($_POST['pseudo']) && isset($_POST['password'])) {

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];


    $bdd = connexion_sql();
    $sql = "SELECT *  from membres WHERE pseudo = '$pseudo'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $user = mysqli_fetch_array($req);

    if(password_verify($password, $user['password'])){
//        session_start();
//        if($user['confirmation_token']==1) {
//            $_SESSION['id'] = $user['id'];
//            $_SESSION['pseudo'] = $pseudo;
//            $_SESSION['password'] = $password;
//            $_SESSION['email'] = $user['email'];
//            $_SESSION['erreur_authentification'] = "Vous êtes connecté.";
//            header('location: ../index.php');
//            setcookie('isConnect', 1);
//        }else{
//            $_SESSION['erreur_authentification'] = "Token non validé.";
//            header('location: ../index.php?page=3');
//        }
//        exit();

        echo "ok";
        var_dump(password_verify($password, $user['password']));
    } else {
//        session_start();
//        $_SESSION['erreur_authentification'] = "Pseudo ou mot de passe erroné.";
//        header('location: ../index.php?page=3');
    echo "ko";

echo $password;
echo "<br/>";
echo $user['password'];
        echo "<br/>";
        var_dump(password_verify($password, $user['password']));

    }


} else {
    header('location: ../index.php?page=3');
    exit();

}

?>