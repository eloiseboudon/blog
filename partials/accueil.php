<div class="acceuil_titre">
    <h1>Tous les articles</h1>
</div>


<?php
afficher_liste_articles();


function afficher_liste_articles()
{

    $bdd = connexion_sql();

    $sql = 'SELECT * FROM articles';
    $nbLigne = 0;


    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd)); ?>
    <div class="accueil_articles">
        <?php while ($donnees = mysqli_fetch_array($req)) {
            $nbLigne++;
            ?>
            <?php
            if (($nbLigne % 2) == 0) { ?>
                <div class="accueil_articles_droite">
                    <div class="etiquette_content etiquette_content_right right">
                        <a href="index.php?page=2&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">

                            <div class="article_details">
                                <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
                                <em> <?php echo $donnees['date_article']; ?></em>

                                <div class="description_article">
                                    <?php echo $donnees['description']; ?>
                                </div>
                                <div class="goto_article">
                                        <span><i class="fa fa-hand-o-right"
                                                 aria-hidden="true"></i> Voir l'article</span>
                                </div>
                            </div>

                            <div class="article_image">
                                <img src="<?php echo $donnees['img_article']; ?>">
                            </div>

                        </a>
                    </div>
                    <div class="etiquette_droite_haut"></div>
                    <div class="etiquette_droite_bas"></div>
                </div>

            <?php } else { ?>
                <div class="accueil_articles_gauche">
                    <div class="etiquette_content  etiquette_content_left left">
                        <a href="index.php?page=2&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">

                            <div class="article_image">
                                <img src="<?php echo $donnees['img_article']; ?>">
                            </div>

                            <div class="article_details">
                                <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
                                <em> <?php echo $donnees['date_article']; ?></em>

                                <div class="description_article">
                                    <?php echo $donnees['description']; ?>
                                </div>

                                <div class="goto_article">
                                        <span><i class="fa fa-hand-o-right"
                                                 aria-hidden="true"></i> Voir l'article</span>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="etiquette_gauche_haut"></div>
                    <div class="etiquette_gauche_bas"></div>
                </div>
            <?php }


        } ?>
    </div>
    <?php
    mysqli_close($bdd);

}


?>
