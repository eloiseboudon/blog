<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>L'étiquette - Blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
<h1>L'étiquette</h1>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$id = $_GET['id'];


$req=$bdd->query('SELECT * FROM articles WHERE id_article ='."$id");



while ($donnees = $req->fetch())
{
    ?>

<p>
<?php
echo nl2br(htmlspecialchars($donnees['contenu']));
?>
</p>
    <?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>


</body>
</html>