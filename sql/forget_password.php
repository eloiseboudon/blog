<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 24/11/2017
 * Time: 15:42
 */


require 'connexion.php';

if (!empty($_POST) && !empty($_POST['email'])) {

    $email = $_POST['email'];

    $bdd = connexion_sql();
    $sql = "SELECT * FROM membres WHERE email='$email'";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
    $user = mysqli_fetch_array($req);
    $user_id = $user['id'];
    $prenom = $user['prenom'];

    if ($user) {
        session_start();
        $reset_token = str_random(60);

        $sql2 = "UPDATE verifications SET token='$reset_token', confirmation_token=null, confirmed_at=NOW() WHERE id_membre='$user_id'";
        $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
        $_SESSION['flash']['success'] = 'Les instructions de réinitisalisation de mot de passe vous ont été envoyées par email.';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: L'étiquette <ne-pas-repondre@letiquette-blog.com>" . "\r\n";

        $message = '
            <html>
    <head>
        <title>Veuillez confirmer votre e-mail</title>
    </head>
    <body>
        <h1>Merci de nous avoir rejoint ! </h1>
        Bonjour ' . $prenom . ',<br />

Vous avez demandé une réinitialisation de votre mot de passe. Afin de créer un nouveau mot de passe, cliquez sur le lien suivant: <br />

http://letiquette-blog.com/index.php?page=reset&id='.$user_id.'&token='.$reset_token.'<br />

Si le lien ne fonctionne pas, copiez-collez le dans la barre de navigation de votre navigateur. <br />
        
Merci et à très bientôt ! <br />

L’équipe L’étiquette <br />

Merci de ne pas répondre à ce message. Si vous souhaitez nous <a href="http://www.letiquette-blog.com/index.php?page=contact">contacter</a>, utilisez le formulaire en ligne.

    </body>
    </html>';


        mail($email, 'Nouveau mot de passe', $message, $headers);
        header('Location: ../index.php');
        exit();
    } else {
        session_start();
        $_SESSION['flash']['error'] = 'Aucun compte ne correspond à cette adresse';
        header('Location: ../index.php?page=5');
        exit();
    }

}