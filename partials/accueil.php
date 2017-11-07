<div class="acceuil_titre_global">
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
    <section class="timeline">
        <div class="accueil_articles">
            <?php while ($donnees = mysqli_fetch_array($req)) {
            $nbLigne++;
            ?>
            <?php
            if (($nbLigne % 2) == 0) { ?>
            <div class="timeline-block timeline-block-right">
                <div class="marker"></div>
                <div class="scroll timeline-content">
                    <a href="index.php?page=2&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">
                        <div class="article_titre">
                            <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
                        </div>
                        <div class="article_image">
                            <img src="<?php echo $donnees['img_article']; ?>">
                        </div>

                        <div class="article_details">
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
            </div>


        <?php } else { ?>

            <div class="timeline-block timeline-block-left">
                <div class="marker"></div>
                <div class="scroll timeline-content">
                    <a href="index.php?page=2&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">
                        <div class="article_titre">
                            <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
                        </div>
                        <div class="article_image">
                            <img src="<?php echo $donnees['img_article']; ?>">
                        </div>

                        <div class="article_details">

                            <em> <?php echo $donnees['date_article']; ?></em>

                            <div class="description_article">
                                <?php echo $donnees['description']; ?>
                            </div>

                            <div class="goto_article">
                                        <span><i class="fa fa-hand-o-left"
                                                 aria-hidden="true"></i> Voir l'article</span>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
        <?php }


        } ?>
        </div>
    </section>
    <?php
    mysqli_close($bdd);

}


?>
