<?php

if (isset($_GET['id'])) {
    afficher_article($_GET['id']);
}


function afficher_article($id_article) {
$bdd = connexion_sql();

$sql = 'SELECT * FROM articles WHERE id_article =' . "$id_article";


$req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

$donnees = mysqli_fetch_array($req);
?>
<div class="article">


    <h1><?php echo $donnees['titre']; ?></h1>

    <div class="article_details"><?php echo $donnees['auteur']; ?>
        | <?php echo date_format(new DateTime($donnees['date_article']), 'j-M-Y'); ?></div>

    <div class="article_contenu">
        <?php echo $donnees['contenu']; ?>
    </div>

</div>
<div class="article_commentaire">
    <h2>Commentaires</h2>


    <h3>Ajouter un commentaire</h3>
    <div class="ajouter_commentaire">


        <?php
        if (isset($_POST['submit'])) {
            $auteur = htmlspecialchars(trim($_POST['auteur']));
            $contenu = htmlspecialchars(trim($_POST['contenu']));


            if (empty($auteur) || empty($contenu)) {
                echo "Veuillez renseigner tous les champs.";
            } else {
                inserer_commentaire($id_article, $auteur, $contenu);
            }
        }
        ?>
        <form method="post">
            <label for="auteur">Votre nom:</label>
            <input type="text" name="auteur"/><br/><br/>

            <label for="contenu">Votre commentaire:</label><br/>
            <textarea name="contenu"></textarea><br/>

            <input type="submit" name="submit"/>

        </form>
    </div>
    <h3>Les commentaires</h3>
    <div class="voir_commentaires">
        <?php

        afficher_commentaires($id_article); ?>

    </div>

</div>
    <?php
    mysqli_close($bdd);
    }


    function inserer_commentaire($article, $nom, $contenu)
    {


        $bdd = connexion_sql();
        $sql = "INSERT INTO commentaires (id_article, auteur, contenu, date_commentaire) VALUES ('$article', '$nom','$contenu', NOW() )";
        $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    }

    function afficher_commentaires($id_article)
    {
        $bdd = connexion_sql();
        $sql = 'SELECT auteur, contenu, date_commentaire FROM commentaires WHERE id_article =' . "$id_article" . ' ORDER BY date_commentaire';
        $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));


        while ($donnees = mysqli_fetch_array($req)) {

            ?>
            <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong>
                le <?php echo $donnees['date_commentaire']; ?></p>
            <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
            <?php
        }
    }

    ?>


