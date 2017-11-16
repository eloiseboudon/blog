<?php
include('connexion.php');

if (isset($_POST['nom'])){

    $bdd = connexion_sql();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
//    $date = "12 sept";
    $password= $_POST['password'];
    $sexe= $_POST['sexe'];
    $date_anniversaire = $_POST['date_anniversaire'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $telephone = $_POST['telephone'];

    $checkbox = array();
    $checkbox= $_POST['validate'];
//    $cgu = $checkbox[0];

    if(count($checkbox)!= 1){
        $courrier = 1;
    }
    else{
        $courrier = 0;
    }




//    $pass_hache = sha1($_POST['password']);

    $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription) 
VALUES ('$nom','$prenom','$pseudo','$password','$email','$sexe','$date_anniversaire','$adresse','$code_postal','$telephone','$courrier' ,NOW())";


    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

}
else{echo "non";}

?>