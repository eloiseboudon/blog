<?php
include('connexion.php');

if (isset($_POST['nom'])) {

    $bdd = connexion_sql();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sexe = $_POST['sexe'];
    $ville = $_POST['ville'];

    $date_anniversaire = $_POST['date_anniversaire'];
    $date_anniversaire_format = DateTime::createFromFormat('d/m/Y', $date_anniversaire)->format('Y-m-d');

    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $telephone = $_POST['telephone'];

    $pass_hache = sha1($_POST['password']);

    $checkbox = array();
    $checkbox = $_POST['validate'];
//    $cgu = $checkbox[0];

    if (count($checkbox) != 1) {
        $courrier = 1;
    } else {
        $courrier = 0;
    }


    $membre_pseudo = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE pseudo = '$pseudo'");
    $count_membre_pseudo = mysqli_fetch_array($membre_pseudo);
    $count_pseudo = $count_membre_pseudo['count'];


    $membre_mail = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE email = '$email'");
    $count_membre_mail = mysqli_fetch_array($membre_mail);
    $count_mail = $count_membre_mail['count'];

    if ($count_pseudo != 0) {
        session_start();

        $_SESSION['erreur_inscription'] = "Ce pseudo est déjà utilisé";
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['email']=$email;
        $_SESSION['date']=$date_anniversaire;
        $_SESSION['adresse']=$adresse;
        $_SESSION['code_postal']=$code_postal;
        $_SESSION['ville']=$ville;
        $_SESSION['telephone']=$telephone;
        $_SESSION['pseudo']=$pseudo;
        ?>

        Ce pseudo est déja utilisé
        Veuillez vous <a href="../index.php?page=4">réinscrire</a>.


        <?php

    } elseif ($count_mail != 0) {
        session_start();

        $_SESSION['erreur_inscription'] = "Cet email est déjà utilisé";
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['email']=$email;
        $_SESSION['date']=$date_anniversaire;
        $_SESSION['adresse']=$adresse;
        $_SESSION['code_postal']=$code_postal;
        $_SESSION['ville']=$ville;
        $_SESSION['telephone']=$telephone;
        $_SESSION['pseudo']=$pseudo;
        ?>

        Cet email est déja utilisé
        Veuillez vous <a href="../index.php?page=4">réinscrire</a>.


        <?php
    } else {


        $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription)
VALUES ('$nom','$prenom','$pseudo','$password','$email','$sexe','$date_anniversaire_format','$adresse','$code_postal','$telephone','$courrier' ,NOW())";
        $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));



        ?>

        Félicitaions vous êtes inscrit,
        <a href="../index.php">retour à la page d'accueil</a>.

<?php

    }
}
?>