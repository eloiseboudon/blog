<?php

//if (isset($_COOKIE['nbArticle'])) {
//    setcookie('nbArticles', $_COOKIE['nbArticle'] + 1);
//}

if (isset($_GET['id'])) {
    afficher_article($_GET['id']);
}

function afficher_article($id_article){
$bdd = connexion_sql();

$sql = 'SELECT * FROM articles WHERE id_article =' . "$id_article";


$req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

$donnees = mysqli_fetch_array($req);
?>

    <title>
        <?php echo $donnees['titre']; ?> - L'étiquette
        <?php echo $donnees['description']; ?>
    </title>
    <div class="article">

        <div class="article_titre">
            <h1><?php echo $donnees['titre']; ?></h1>
        </div>

        <div class="article_details">
            <strong><?php echo $donnees['auteur']; ?></strong>
            le <?php echo date_format(new DateTime($donnees['date_article']), 'j-M-Y'); ?>
        </div>
        <div class="article_description">
            <h2><i><?php echo $donnees['description']; ?></i></h2>
        </div>

        <div class="article_contenu">
            <?php echo $donnees['contenu']; ?>
        </div>
        <div class="prochain_article">
            <?php if (isset($_SESSION['connexion'])) { ?>
                <p>Souhaitez vous recevoir une notification à la sortie du prochain article ?</p>
                <form action="mailing/mail_prochain_article.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>"/>
                    <input type="submit" value="Oui"/>
                </form>

            <?php } else { ?>
                <p>Pour être informé de la sortie du prochain article :</p>

                <form action="mailing/mail_pro_article_sans_compte.php" method="post">
                    <label for="nom"><span>Nom <span class="required">*</span></span><input type="text"
                                                                                            class="input-field"
                                                                                            name="nom"
                                                                                            required/>
                    </label>

                    <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"
                                                                                                  class="input-field"
                                                                                                  name="prenom"
                                                                                                  required/>
                    </label>
                    <label for="email"><span>Email <span class="required">*</span></span><input type="email"
                                                                                                class="input-field"
                                                                                                name="email"
                                                                                                required/>
                    </label>

                    <input type="submit" value="Valider"/>

                </form>
                <?php
            } ?>
        </div>
    </div>
    <div class="sous_article">
        <div class="article_sociaux">
            <div class="partage_reseaux_sociaux">

                <h2>Partager sur les réseaux sociaux</h2>
            </div>
            <div class="icon_res_soc">
                <script>function fbs_click() {
                        u = location.href;
                        t = document.title;
                        window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t), 'sharer', 'toolbar=0,status=0,width=626,height=436');
                        return false;

                    }</script>

                <a href="http://www.facebook.com/share.php?u=<url>" title="Partagez sur facebook"
                   onclick="return fbs_click()" target="_blank"><img src="assets/icones/facebook-carre.png"></a>

                <?php
                function get_img()
                {
                    $image = "";
                    return $image;
                }


                function get_url()
                {
                    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                }

                ?>

                <a rel="nofollow"
                   href="http://twitter.com/share?text=<?php echo urlencode("Currently reading: "); ?>&url&via=letiquette"
                   title="Partagez cet article avec vos followers" target="_blank"><img
                            src="assets/icones/twitter-carre.png"></a>

                <a href="https://plus.google.com/share?url=<?php echo get_url(); ?>"
                   title="Partagez cet article avec votre communauté Google" target="_blank"><img
                            src="assets/icones/google-plus-carre.png"></a>


                <a href="https://pinterest.com/pin/create/button/?description=<?php echo urlencode("Currently reading"); ?>&url=<?php echo urlencode(get_url()); ?>"
                   title="Partagez sur Pinterest" target="_blank"><img src="assets/icones/pinterest-carre.png"></a>


                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_url()); ?>&title=<?php echo urlencode("Currently reading"); ?>"
                   title="Partagez sur LinkedIn" target="_blank"><img src="assets/icones/linkedin-carre.png"></a>


                <a href="mailto:?subject=<?php echo urlencode(get_url()); ?>&body=<?php echo urlencode("Currently reading"); ?>"
                   title="Partagez par mail"><img src="assets/icones/email-carre.png"></a>

            </div>
        </div>
    </div>

<div class="article_commentaire">

    <div class="article_titre">
        <h2>Ajouter un commentaire</h2>
    </div>
    <div class="ajouter_commentaire">

        <?php
        ajouter_commentaire($id_article);
        ?>

        <div class="article_titre">
            <h2>Les commentaires</h2>
        </div>

        <div class="voir_commentaires">
            <?php afficher_commentaires($id_article); ?>

        </div>

    </div>
    <?php
    mysqli_close($bdd);
    }

    function ajouter_commentaire($id_article){
    ?>

    <form method="post">
        <div class="row">
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <div class="col-12">
                    <div class="form_contenu">
                        <label for="contenu">Votre commentaire : </label><br/>
                        <textarea type="text" name="contenu"></textarea>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="col-lg-6 col-xs-12">
                    <div class="connexion">
                        <p>Veuillez vous connecter pour laisser un commentaire : </p>

                        <a href="index.php?page=3"><span><i class="fa fa-user"
                                                            aria-hidden="true"></i> Connexion</span>
                        </a>
                        <a href="index.php?page=4"><span><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Inscription</span> </a>

                    </div>
                </div>

                <div class="col-lg-6 col-xs-12">
                    <div class="form_contenu">
                        <label for="contenu">Votre commentaire : </label><br/>
                        <textarea type="text" name="contenu"></textarea>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button type="submit" name="submit" class="btn btn-form">
            <i class="fa fa-check" aria-hidden="true"></i> Envoyer
        </button>


    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $contenu = htmlspecialchars($_POST['contenu'], ENT_QUOTES);

    if (!isset($_SESSION['user'])) {

        ?>
        <div class="pop-up">
            <div class="alert alert-danger" role="alert">
                <?php
                echo 'Veuillez vous connecter.';
                ?></div>
        </div>
        <?php
    } elseif (empty($contenu)) {
        ?>
        <div class="pop-up">
        <div class="alert alert-danger" role="alert">
            <?php
            echo 'Veuillez remplir le contenu du commentaire.';
            ?></div>
        </div><?php
    } else {
        inserer_commentaire($id_article, $contenu);
    }
}

}

function inserer_commentaire($article, $contenu)
{
    $bdd = connexion_sql();
    $id_auteur = $_SESSION['user']['id'];
    $sql = "INSERT INTO commentaires (id_article, auteur, contenu, date_commentaire) VALUES ('$article', '$id_auteur','$contenu', NOW() )";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));


    ?>
    <div class="pop-up">
    <div class="alert alert-success" role="alert">
        <?php
        echo 'Merci pour votre commentaire, celui-ci sera bientot en ligne.';
        ?></div>
    </div><?php
}

function afficher_commentaires($id_article)
{
    $bdd = connexion_sql();

    $nb_com = $bdd->query("SELECT COUNT(*) AS count FROM commentaires JOIN membres ON membres.id=commentaires.auteur WHERE id_article ='$id_article' AND approuve=1");
    $count_nb_com = mysqli_fetch_array($nb_com);
    $count_com = $count_nb_com['count'];

    $sql = "SELECT * FROM commentaires JOIN membres  ON membres.id=commentaires.auteur WHERE id_article ='$id_article' AND approuve=1 ORDER BY date_commentaire desc LIMIT 5";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    ?>
    <div id="commentaires-view-5">
    <?php
    while ($donnees = mysqli_fetch_array($req)) {

        ?>
        <div class="commentaires">
            <div class="commentaire_informations">
                <p><strong><?php echo $donnees['pseudo'];
                        echo $donnees['id_commentaire']; ?></strong>
                    le <?php echo date_format(new DateTime($donnees['date_commentaire']), 'j-M-Y à H:i:s'); ?></p>
            </div>

            <div class="commentaire_contenu">
                <?php echo $donnees['contenu']; ?>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if ($count_com > 5) {
        ?>
        <div class="voir_plus">
            <a>
                <i class="fa fa-chevron-circle-down mask" aria-hidden="true"></i> Voir plus
            </a>
        </div>
        </div>

        <?php
        $sql2 = "SELECT * FROM commentaires JOIN membres  ON membres.id=commentaires.auteur WHERE id_article ='$id_article' AND approuve=1 ORDER BY date_commentaire desc ";
        $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));

        ?>
        <div id="commentaires-view-all">

        <?php
        while ($donnees = mysqli_fetch_array($req2)) {

            ?>
            <div class="commentaires">
                <div class="commentaire_informations">
                    <p><strong><?php echo $donnees['pseudo'];
                            echo $donnees['id_commentaire']; ?></strong>
                        le <?php echo date_format(new DateTime($donnees['date_commentaire']), 'j-M-Y à H:i:s'); ?></p>
                </div>

                <div class="commentaire_contenu">
                    <?php echo $donnees['contenu']; ?>
                </div>
            </div>
            <?php
        } ?>
        <div class="voir_moins">
            <a>
                <i class="fa fa-chevron-circle-up demask" aria-hidden="true"></i> Voir moins
            </a>
        </div>
        </div><?php

    }
}

?>

<!-- Modal -->
<!--<div class="modal fade" id="myModal_prochain_article" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h3 class="modal-title">Sortie du prochain article</h3>-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!---->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                --><?php
//                if (isset($_SESSION['user']['pseudo'])) {
//                    ?><!--<p>Vous recevrez un mail à l'adresse suivante --><?php //echo $_SESSION['user']['email'] ?><!-- lors de la-->
<!--                    sortie du prochain article.-->
<!--                    </p>-->
<!--                    --><?php
//                } else {
//                    ?>
<!--                    <div class="connexion">-->
<!--                        <p>Veuillez vous connecter afin de recevoir le mail : </p>-->
<!--                        <a href="index.php?page=3"><span><i class="fa fa-user" aria-hidden="true"></i> Connexion</span>-->
<!--                        </a>-->
<!--                        <a href="index.php?page=4"><span><i class="fa fa-pencil"-->
<!--                                                            aria-hidden="true"></i> Inscription</span> </a>-->
<!--                    </div>-->
<!--                    --><?php
//                } ?>
<!---->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                --><?php //if (isset($_SESSION['user']['pseudo'])) {
//                    ?>
<!--                    <form action="mailing/mail_prochain_article.php" method="post">-->
<!--                        <input type="hidden" name="id" value="--><?php //echo $_SESSION['user']['id'] ?><!--"/>-->
<!--                        <input type="submit" value="J'accepte"/>-->
<!--                    </form>-->
<!--                    --><?php
//                } ?>
<!--                <button type="button" class="btn btn-default btn_modal_close" data-dismiss="modal">Fermer</button>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->