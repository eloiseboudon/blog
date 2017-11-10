<div class="inscription_compte">
    <div class="cercle"></div>
    <div class="ficelle"></div>
    <div class="inscription_form">


    <form method="post">
<!--        <div class="fieldselt_1">-->
            <fieldset><legend>Nom</legend><input type="text" name="nom"/></fieldset>
            <fieldset><legend>Prénom</legend><input type="text" name="prenom"/></fieldset>
<!--        </div>-->
        <fieldset><legend>Pseudo</legend><input type="text" name="pseudo"/></fieldset>
        <fieldset><legend>Mot de passe</legend><input type="password" name="password"/></fieldset>
        <fieldset><legend>Adresse email</legend><input type="email" name="email"/></fieldset>
        <button type="submit" name="submit" class="btn btn-form">
            <i class="fa fa-check" aria-hidden="true"></i> Se connecter
        </button>

    </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])){
    $bdd = connexion_sql();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $date = "12 sept";
    $pass_hache = sha1($_POST['password']);

    $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email, date_inscription) VALUES ('$nom','$prenom','$pseudo','$pass_hache','$email', NOW())";

    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

}

?>