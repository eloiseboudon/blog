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


$req=$bdd->query('SELECT * FROM articles');

while ($donnees = $req->fetch())
{
?>


    <div class="accueil">
        <h3>
            <?php echo htmlspecialchars($donnees['titre']); ?>
            <em>le <?php echo $donnees['date']; ?></em>
        </h3>

        <p>
            <?php
            // On affiche le contenu du billet
//            echo nl2br(htmlspecialchars($donnees['contenu']));
//            ?>
            <br />
            <a href="article.php?id=<?php echo $donnees['id_article'];?>&nom=<?php echo $donnees['titre'];?>">Article</a>
        </p>
    </div>
    <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>