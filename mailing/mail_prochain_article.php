<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 30/11/2017
 * Time: 16:35
 */

require '../sql/connexion.php';

if (isset($_POST['id'])) {
    $user_id = $_POST['id'];
    $bdd = connexion_sql();
    $sql = "INSERT INTO mail(id_membre,nom, prenom, email, prochain_article) VALUES ('$user_id',0,0,0,1)";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
}
session_start();
$_SESSION['flash']['success'] = 'Vous recevrez un mail lors de la sortie du prochain article.';
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
exit();
