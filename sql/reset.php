<?php

require 'connexion.php';

if (isset($_GET['id']) && isset($_GET['token'])) {
    session_start();
    $user_id = $_GET['id'];
    $token = $_GET['token'];

    $bdd = connexion_sql();
    $sql = "SELECT * FROM membres WHERE id='$user_id' AND token = '$token' AND confirmed_at > DATE_SUB(NOW(), INTERVAL  30 MINUTE)";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));

    $user = mysqli_fetch_array($req);

    if ($user) {
        if (!empty($_POST)) {
            if (isset($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $bdd = connexion_sql();
                $sql2 = "UPDATE membres SET password='$password',confirmation_token=1, confirmed_at=NOW() WHERE id='$user_id'";
                $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));

                session_start();
                $_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié.';
                $_SESSION['auth'] = $user;
                header('Location: ../index.php');
                exit();
            } else {
                session_start();
                $_SESSION['flash']['error'] = "Ce token n'est pas valide.";
                header('Location: ../index.php');
                exit();
            }
        }

    } else {
        header('Location: ../index.php');
        exit();
    }
}
?>


<div class="contenu">
    <div class="form-authentification">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <form action="" method="post">
            <label for="password"><span>Mot de passe <span class="required">*</span></span><input
                        type="password"
                        class="input-field"
                        name="password"
                        required="required"/>
                <i class="fa fa-eye unmask" aria-hidden="true"></i>
            </label>
            <input type="submit" value="Valider"/>
        </form>
    </div>
</div>