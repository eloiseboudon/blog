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
    $sql = "INSERT INTO mail(id_membre, prochain_article) VALUES ('$user_id',1)";
    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
}


$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
exit();
