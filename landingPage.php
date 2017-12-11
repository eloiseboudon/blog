<div class="landing_page">
    <h1>
        Bienvenue sur le blog de mode éthique de L’étiquette !
    </h1>


    <h2>
        Toutes nos félicitations, vous venez de trouver la version 0.01 de notre blog de shopping responsable !
        Nous
        sommes encore en construction, vous aurez très bientôt accès à un florilège d’articles tous plus
        passionnants les uns que les autres (oui oui promis) concernant le vaste sujet qu’est la mode éthique.
    </h2>

    <div class="contenu">
        <div class="form-etiquette">
            <div class="cercle"></div>
            <div class="ficelle"></div>
            <p style="text-align: left">Nous reviendrons très bientôt vers vous pour vous tenir au courant de
                notre lancement. Si vous
                voulez
                recevoir
                une alerte en avant-première, laissez-nous votre mail ici :
            </p>
            <form action="" method="post">
                <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"
                                                                                              class="input-field"
                                                                                              name="prenom"
                                                                                              required/>
                </label>

                <label for="email"><span>Email <span class="required">*</span></span><input type="email" class="input-field"
                                                             name="email"
                                                             required/>
                </label>
                <input type="submit" value="Valider"/>
            </form>
            Patience patience, mes jeunes Palawan, bientôt nous allons vous en mettre plein la vue !


            <br/>
            A très bientôt !<br/>
            <h2>Eloïse & Justine</h2>
        </div>
    </div>
</div>

<?php

if (isset($_POST['email']) && isset($_POST['prenom'])) {

    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $landingPage = "landingPage";

$bdd = connexion_sql();
    $sql = "INSERT INTO membres (nom, prenom, pseudo, email,date_inscription) VALUES ('$landingPage','$prenom','$landingPage','$email',NOW())";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));
    $user_id = mysqli_insert_id($bdd);


    $sql2 = "INSERT INTO mail (id_membre, date, avantPremiere) VALUES ('$user_id',NOW(),1)";
    $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));


}