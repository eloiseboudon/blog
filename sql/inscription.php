<?php
include('connexion.php');

if (isset($_POST['nom'])){
    echo ($_POST['nom']);

    $bdd = connexion_sql();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $date = "12 sept";
    $password= $_POST['password'];
//    $pass_hache = sha1($_POST['password']);

//    $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email, date_inscription) VALUES ('$nom','$prenom','$pseudo','$password','$email', NOW())";

//    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

}
else{echo "non";}

?>