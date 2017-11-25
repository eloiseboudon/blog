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

<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
      integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


<link href="../css/main.css" rel="stylesheet"/>
<link href="../css/etiquettes.css" rel="stylesheet"/>
<body>

<div class="menu">
    <nav class="menu" id="menu" xmlns="http://www.w3.org/1999/html">
        <div class="menu-item logo"><a href="/blog"><img src="../assets/logo.png"></a></div>
        <div id="acceuil" class="menu-item"><a href="/blog">Accueil</a></div>
    </nav>
</div>


<div class="contenu">
    <div class="global_width">
        <div class="reset_mdp">
            <div class="contenu">
                <div class="form-authentification">
                    <div class="cercle"></div>
                    <div class="ficelle"></div>
                    <form action="" method="post">
                        <label for="password"><span>Mot de passe </span><input
                                    type="password"
                                    class="input-field"
                                    name="password"
                                    required
                            <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">/>
                            <i class="fa fa-eye unmask" aria-hidden="true"></i>
                        </label>
                        <span class="required password">8 caractères minimum comportant au moins une minuscule, une majuscule, un chiffre et un caractère spécial (@,!,?, ...)</span>
                        <label></label>
                        <input type="submit" value="Valider"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>