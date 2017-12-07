<?php
include_once 'vendor/autoload.php';
//include 'sqL/connexion.php';

const CLIENT_ID = '121564257068-dsfqbu2qnc0m38rmg7mc0lbadbnk4ogf.apps.googleusercontent.com';
const CLIENT_SECRET = 'GN8ZlJ4sQJbLYAiIIsaKnUhS';
const REDIRECT_URL = 'http://www.letiquette-blog.com/index.php?page=3';

session_start();

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URL);
$client->addScope('https://www.googleapis.com/auth/plus.login');
$client->addScope('https://www.googleapis.com/auth/plus.me');
$client->addScope('https://www.googleapis.com/auth/userinfo.email');
$client->addScope('https://www.googleapis.com/auth/userinfo.profile');
$client->addScope('https://www.googleapis.com/auth/user.birthday.read');


$plus = new Google_Service_Plus($client);


if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var(REDIRECT_URL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $me = $plus->people->get('me');


    $id = $me['id'];
    $name =  $me['displayName'];
    $email =  $me['emails'][0]['value'];
    $sexe = substr($me['gender'],0,1);
    $prenom = explode(' ', $name)[0];
    $nom = explode(' ', $name)[1];

    $bdd = connexion_sql();

    $sql = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE email ='$email'");
    $count_user = mysqli_fetch_array($sql);
    $count_user_exist = $count_user['count'];



    if ($count_user_exist == 0) {
        $pseudo = explode('@', $email)[0];
        $sql = "INSERT INTO membres (nom, prenom, pseudo, email,sexe,date_inscription)
VALUES ('$nom','$prenom','$prenom','$email','$sexe',NOW())";
        $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
        $user_id = mysqli_insert_id($bdd);

        $sql2 = "INSERT INTO verifications (id_membre, derniere_connexion) VALUES('$user_id',NOW())";
        $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
    } else {
        $sql3 = "SELECT * from membres WHERE email = '$email'";
        $req3 = $bdd->query($sql3) or die ('Erreur SQL : ' . mysqli_error($bdd));
        $user_ = mysqli_fetch_array($req3);
        $user_id = $user_['id'];
        $sql4 = "UPDATE verifications SET derniere_connexion = NOW() WHERE id_membre ='$user_id'";
        $req4 = $bdd->query($sql4) or die ('Erreur SQL : ' . mysqli_error($bdd));
    }

    $sql5 = "SELECT * from membres WHERE id = '$user_id'";
    $req5 = $bdd->query($sql5) or die ('Erreur SQL : ' . mysqli_error($bdd));
    $user = mysqli_fetch_array($req5);

    $_SESSION['connexion'] = "google";
    $_SESSION['user'] = $user;

    $_SESSION['flash']['success'] = "Vous êtes connecté grâce à votre compte Google.";
    $output = "";

    echo "<script type='text/javascript'>location.replace('index.php');</script>";
    exit();


} else {
    $authUrl = $client->createAuthUrl();
}

?>

<div>
    <?php

    if (isset($authUrl)) {
        echo '<div class="google-signin"> <a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-signin/btn_google_signin_light_normal.png" /></a></div>';
    }
    ?>
</div>
