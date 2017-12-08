<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 05/12/2017
 * Time: 14:29
 */

if (isset($_GET['search'])) {
    afficher_search($_GET['search']);
}


function afficher_search($search)
{
    $bdd = connexion_sql();

    $sql = "SELECT * FROM articles WHERE titre LIKE '%$search%' OR contenu LIKE '%$search%' OR description LIKE '%$search%'";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $row_count = $req->num_rows;

    if ($row_count > 0) {

        $nbLigne = 0; ?>
        <section class="timeline">
            <div id="accueil_articles-id" class="accueil_articles">
                <?php while ($donnees = mysqli_fetch_array($req)) {
                    $nbLigne++;
                    ?>
                    <?php
                    if (($nbLigne % 2) == 0) { ?>
                        <div class="timeline-block timeline-block-right">
                            <div class="cercle"></div>
                            <div class="ficelle"></div>
                            <div class="scroll timeline-content">
                                <a href="index.php?page=article&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">
                                    <div class="article_image">
                                        <img src="<?php echo $donnees['img_article']; ?>">
                                    </div>
                                    <div class="article_details">
                                        <div class="article_titre">
                                            <h2><?php echo $donnees['titre']; ?></h2>
                                        </div>

                                        <div class="article_auteur">
                                            <?php echo $donnees['auteur']; ?>
                                        </div>
                                        <div class="article_date">
                                            <em> <?php echo date_format(new DateTime($donnees['date_article']), 'j-M-Y'); ?></em>
                                        </div>

                                        <div class="description_article">
                                            <?php echo $donnees['description']; ?>
                                        </div>
                                        <div class="goto_article">
                                            <span>Voir l'article</span>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>


                    <?php } else { ?>

                        <div class="timeline-block timeline-block-left">
                            <div class="cercle"></div>
                            <div class="ficelle"></div>
                            <div class="scroll timeline-content">
                                <a href="index.php?page=article&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">
                                    <div class="article_image">
                                        <img src="<?php echo $donnees['img_article']; ?>">
                                    </div>
                                    <div class="article_details">

                                        <div class="article_titre" style="direction: ltr">
                                            <h2><?php echo $donnees['titre']; ?></h2>
                                        </div>

                                        <div class="article_auteur">
                                            <?php echo $donnees['auteur']; ?>
                                        </div>

                                        <div class="article_date" dir="auto">
                                            <em> <?php echo date_format(new DateTime($donnees['date_article']), 'j-M-Y'); ?></em>
                                        </div>
                                        <div class="description_article">
                                            <?php echo $donnees['description']; ?>
                                        </div>

                                        <div class="goto_article">
                                         <span>
                                             Voir l'article
                                         </span>
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
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['flash']['error'] = "0 résultat correspondant.";
        header('location: index.php');
        exit();
    }

    mysqli_close($bdd);

}

?>