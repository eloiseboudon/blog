<?php

require 'connexion.php';

if (isset($_POST['reponse']) && isset($_POST['id_commentaire']) && isset($_POST['id_membre'])) {

    $id_commentaire = $_POST['id_commentaire'];
    $id_membre = $_POST['id_membre'];
    $reponse =  htmlspecialchars($_POST['reponse'],ENT_QUOTES);

    $bdd = connexion_sql();
    $sql = "INSERT INTO reponses_commentaire (id_commentaire, id_membre, date_reponse, reponse) VALUES ('$id_commentaire','$id_membre',NOW(),'$reponse')";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));


    session_start();
    $_SESSION['flash']['success'] = 'Votre réponse a bien été postée.';
    header ("Location: $_SERVER[HTTP_REFERER]" );
}


?>