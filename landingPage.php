<html lang="fr">
<head>
    <meta name="author" content="L'étiquette"/>
    <meta name="keywords" content="L'étiquette, blog, éthique"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="icon" href="assets/icone-rouge.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link href="css/main.css" rel="stylesheet"/>
    <link href="css/etiquettes.css" rel="stylesheet"/>
    <link href="css/timeline.css" rel="stylesheet"/>
</head>
<body>
<div class="landing_page">
    <h1>
    Bienvenue sur la marketplace de mode éthique de L’étiquette !
    </h1>


    <h2>
    Bravo, vous venez de découvrir la version 0.01 de notre marketplace pour un shopping
    responsable ! Nous sommes encore en construction, vous aurez très bientôt accès à une multitude
    d’habits, chaussures et accessoires pour vous habiller de manière éthique.
    </h2>

    <div class="contenu">
        <div class="form-etiquette">
            <div class="cercle"></div>
            <div class="ficelle"></div>
            <p style="text-align: left">Nous reviendrons très bientôt vers vous pour vous tenir au courant de notre lancement. Si vous voulez recevoir une alerte en avant-première, laissez-nous votre mail ici : 
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
            Préparez-vous à être éblouis ! (et on exagère à peine). En attendant, vous pouvez visiter notre blog pour en apprendre un peu plus au sujet de la mode éthique en cliquant <a href="www.letiquette-blog.com">ici</a>. 


            <br/>
            A très bientôt !<br/>
            <h2>Eloïse & Justine</h2>
        </div>
    </div>
</div>
</body>
</html>
<?php

if (isset($_POST['email']) && isset($_POST['prenom'])) {

    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $landingPage = "landingPageMarketPlace";

$bdd = connexion_sql();
    $sql = "INSERT INTO membres (nom, prenom, pseudo, email,date_inscription) VALUES ('$landingPage','$prenom','$landingPage','$email',NOW())";
    $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));
    $user_id = mysqli_insert_id($bdd);


    $sql2 = "INSERT INTO mail (id_membre, date, avantPremiere) VALUES ('$user_id',NOW(),1)";
    $req2 = $bdd->query($sql2) or die ('Erreur SQL : ' . mysqli_error($bdd));


}