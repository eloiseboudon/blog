<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 05/12/2017
 * Time: 10:50
 */


require '../sql/connexion.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $bdd = connexion_sql();
    $sql = "INSERT INTO mail(id_membre,nom, prenom, email, prochain_article) VALUES (0,'$nom','$prenom','$email',1)";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
}
session_start();
$_SESSION['flash']['success'] = 'Vous recevrez un mail lors de la sortie du prochain article.';
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
exit();
