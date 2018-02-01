<title>
    Connexion - L’étiquette - Blog mode éthique
</title>
<meta name="description" content="Chaque semaine retrouvez des articles fun et décalés sur le shopping responsable. Connectez-vous pour pouvoir
    laisser des commentaires et interagir avec la communauté !">

<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>


        <?php
//        include 'auth/googlePlus_config.php';


        if (isset($authUrl)) {
            echo '<div class="google-signin"> <a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-signin/btn_google_signin_light_normal.png" /></a></div>';
        }
        ?>


<!--        --><?php

//
//        if (isset($_SESSION['flash']['success'])) {
//            ?>
<!--            <div class="alert alert-success" role="alert">-->
<!--            --><?php
//            echo $_SESSION['flash']['success'];
//            ?><!--</div>--><?php
//        } elseif (isset($_SESSION['flash']['error'])) {
//            ?>
<!--            <div class="alert alert-danger" role="alert">-->
<!--            --><?php
//            echo $_SESSION['flash']['error'];
//            ?><!--</div>--><?php
//            $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
//        } else {
//            $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
//        }

//        ?>




        <div class="authentification_form">

            <form action="sql/authentification.php" method="post">

                <label for="login"><span>Pseudo ou email <span class="required">*</span></span><input type="text"
                                                                                                      class="input-field"
                                                                                                      name="login"
                                                                                                      required="required"/></label>
                <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="password"
                                                                                                      class="input-field"
                                                                                                      name="password"
                                                                                                      required="required"/>
                    <i class="fa fa-eye unmask" aria-hidden="true"></i>
                </label>
                <input type="submit" value="Valider"/>

            </form>

            <a href="inscription">Pas encore inscrit ?</a><br/>
            <a href="forget_password">Mot de passe oublié</a>


        </div>
    </div>
</div>

