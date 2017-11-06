<div class="acceuil_titre">
    <h1>Tous les articles</h1>
</div>


<?php
afficher_liste_articles();


function afficher_liste_articles()
{

    $bdd = connexion_sql();

    $sql = 'SELECT * FROM articles';


    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    while ($donnees = mysqli_fetch_array($req)) {

        ?>
        <div class="accueil_articles">

            <a href="index.php?page=2&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">
                <div class="row">
                    <div class="col-4">
                        <div class="article_image">
                            <img src="<?php echo $donnees['img_article']; ?>">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="article_details">
                            <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
                            <em> <?php echo $donnees['date_article']; ?></em>


                            <div class="description_article">
                                <?php echo $donnees['description']; ?>
                            </div>

                            <div class="goto_article">
                                <span><i class="fa fa-hand-o-right" aria-hidden="true"></i> Voir l'article</span>
                            </div>

                        </div>
                    </div>
                </div>
            </a>

        </div>
        <?php
    } // Fin de la boucle des billets


    mysqli_close($bdd);

}


?>
