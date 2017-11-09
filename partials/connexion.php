<div class="authentification_compte">
    <form method="get">
        <fieldset><legend>Pseudo </legend><input type="text" name="pseudo"/></fieldset>
        <fieldset><legend>Mot de passe </legend><input type="password" name="password"/></fieldset>
        <button type="submit" name="submit" class="btn btn-form">
            <i class="fa fa-check" aria-hidden="true"></i> Se connecter
        </button>
    </form>

    <a href="index.php?page=4">Pas encore inscrit ?</a>

</div>



<?php
if (isset($_GET['submit'])) {
    $pass_hache = sha1($_POST['password']);

    $bdd = connexion_sql();
    $sql = "SELECT id from membres WHERE pseudo = '$pseudo' AND password = '$pass_hache'";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $resultat = mysqli_fetch_array($req);

    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
//        session_start();
//        $_SESSION['id'] = $resultat['id'];
//        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }

}


?>


