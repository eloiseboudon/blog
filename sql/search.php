<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 05/12/2017
 * Time: 14:29
 */

if (isset($_GET['search'])) {
    require 'connexion.php';

    $search = $_GET['search'];
echo $search;
    $bdd = connexion_sql();

    $sql = "SELECT * FROM articles WHERE titre LIKE '$search'";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));
    $article = mysqli_fetch_array($req);

}

