<?php

afficher_liste_articles();


function afficher_liste_articles(){
    $bdd = connexion_sql();

    $sql = 'SELECT * FROM articles';


    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));

    while ($donnees = mysqli_fetch_array($req)) {

            ?>
            <div class="accueil">
                <h3>
                    <?php echo htmlspecialchars($donnees['titre']); ?>
                    <em>le <?php echo $donnees['date_article']; ?></em>
                </h3>
                <p>
                    <?php

                    // description de l'article
                    ?>
                    <br/>
                    <a href="index.php?page=2&id=<?php echo $donnees['id_article']; ?>&nom=<?php echo $donnees['titre']; ?>">Article</a>
                </p>
            </div>
            <?php
        } // Fin de la boucle des billets


        mysqli_close($bdd);

}




?>
