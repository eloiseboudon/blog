<?php
require 'connexion.php';

if (isset($_POST['nom'])) {

    $bdd = connexion_sql();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sexe = $_POST['sexe'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $date_anniversaire = $_POST['date_anniversaire'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    $checkbox = array();
    $checkbox = $_POST['validate'];

    if (count($checkbox) != 1) {
        $courrier = 1;
    } else {
        $courrier = 0;
    }

//    $options=['salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];


    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $token = str_random(60);


    $membre_pseudo = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE pseudo = '$pseudo'");
    $count_membre_pseudo = mysqli_fetch_array($membre_pseudo);
    $count_pseudo = $count_membre_pseudo['count'];


    $membre_mail = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE email = '$email'");
    $count_membre_mail = mysqli_fetch_array($membre_mail);
    $count_mail = $count_membre_mail['count'];

    if ($count_pseudo != 0) {
        session_start();

        $_SESSION['flash']['error'] = "Ce pseudo est déjà utilisé";

        $_SESSION['user'] = [
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'email' => $email,
            'date' => $date_anniversaire,
            'adresse' => $adresse,
            'code_postal' => $code_postal,
            'ville' => $ville,
            'telephone' => $telephone,
        ];


        header('location:../index.php?page=4');
        exit();


    } elseif ($count_mail != 0) {
        session_start();

        $_SESSION['user'] = [
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'email' => $email,
            'date' => $date_anniversaire,
            'adresse' => $adresse,
            'code_postal' => $code_postal,
            'ville' => $ville,
            'telephone' => $telephone,
        ];

        header('location:../index.php?page=4');
        exit();

    } else {


        $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription, token, confirmation_token)
VALUES ('$nom','$prenom','$pseudo','$password_hash','$email','$sexe','$date_anniversaire','$adresse','$code_postal','$telephone','$courrier' ,NOW(),'$token', null)";
        $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));

        $user_id = mysqli_insert_id($bdd);

        mail($email, 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://letiquette-shop.com/blog/sql/confirm.php?id=$user_id&token=$token");

        session_start();

        $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte.';
        header('location:../index.php');
        exit();

    }
}

?>