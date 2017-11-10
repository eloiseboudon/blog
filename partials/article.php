<?php

if (isset($_GET['id'])) {
    afficher_article($_GET['id']);
}


function afficher_article($id_article)
{
    $bdd = connexion_sql();

    $sql = 'SELECT * FROM articles WHERE id_article =' . "$id_article";


    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    $donnees = mysqli_fetch_array($req);
    ?>
    <div class="article">


        <h1><?php echo $donnees['titre']; ?></h1>

        <div class="article_details"><strong><?php echo $donnees['auteur']; ?></strong>
            le<?php echo date_format(new DateTime($donnees['date_article']), 'j-M-Y'); ?></div>

        <div class="article_contenu">
            <?php echo $donnees['contenu']; ?>
        </div>

    </div>
    <div class="article_commentaire">


        <h3>Ajouter un commentaire</h3>
        <div class="ajouter_commentaire">


<?php
        if (isset($_POST['submit'])) {
    //                $auteur = htmlspecialchars(trim($_POST['auteur']));
            $contenu = htmlspecialchars($_POST['contenu'],ENT_QUOTES);


    //                if (empty($auteur) || empty($contenu)) {
            if(empty($contenu)){
                echo "Veuillez renseigner tous les champs.";
            } else {
                inserer_commentaire($id_article, $contenu);
            }
        }

            ?>
            <form method="post">
                <div class="row">

                    <div class="col-6">
                        <div class="connexion">
                            <p>Veuillez vous connecter pour laisser un commentaire: </p>
                            <a href="index.php?page=3"><span><i class="fa fa-user" aria-hidden="true"></i> Connexion</span> </a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form_contenu">
                            <label for="contenu">Votre commentaire:</label><br/>
                            <textarea type="text" name="contenu"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-form">
                    <i class="fa fa-check" aria-hidden="true"></i> Envoyer
                </button>


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


function inserer_commentaire($article, $contenu){
    $bdd = connexion_sql();
    $nom = "Test";
    $sql = "INSERT INTO commentaires (id_article, auteur, contenu, date_commentaire) VALUES ('$article', '$nom','$contenu', NOW() )";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

}

function afficher_commentaires($id_article)
{
    $bdd = connexion_sql();
    $sql = 'SELECT auteur, contenu, date_commentaire FROM commentaires WHERE id_article =' . "$id_article" . ' ORDER BY date_commentaire desc';
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));


    while ($donnees = mysqli_fetch_array($req)) {

        ?>

        <div class="commentaire_informations">
            <p><strong><?php echo $donnees['auteur']; ?></strong>
                le <?php echo date_format(new DateTime($donnees['date_commentaire']), 'j-M-Y à H:i:s'); ?></p>
        </div>

        <div class="commentaire_contenu">
            <?php echo $donnees['contenu']; ?>
        </div>

        <?php
    }
}

?>


