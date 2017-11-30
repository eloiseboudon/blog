<!DOCTYPE html>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_COOKIE['isConnect'])) {
    setcookie('isConnect', 0, time() + 365 * 24 * 3600, "/", null, false, true);
} else {
    if ($_COOKIE['isConnect'] = !3 || $_COOKIE['isConnect'] == 0 || $_COOKIE['isConnect'] == 1 ||(isset($_SESSION['connexion']) && $_SESSION['connexion'] =="google")) {
        if (isset($_SESSION['user']['pseudo']) && isset($_SESSION['user']['email'])) {
            setcookie('pseudo', $_SESSION['user']['pseudo'], time() + 365 * 24 * 3600, "/", null, false, true);
//            setcookie('password', $_SESSION['user']['password'], time() + 365 * 24 * 3600, "/", null, false, true);
            setcookie('email', $_SESSION['user']['email'], time() + 365 * 24 * 3600, "/", null, false, true);
            setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");
        } else {
            setcookie('isConnect', 2, time() + 365 * 24 * 3600, "/");
        }
    }
}

if (isset($_COOKIE['isConnect'])) {
    if ($_COOKIE['isConnect'] != 1 && $_COOKIE['isConnect'] != 3) {
        if ($_COOKIE['isConnect'] == 2 && isset($_COOKIE['pseudo']) && isset($_COOKIE['password'])) {
            include('sql/authentification_auto.php');
        }
    }
}

//if(isset($_COOKIE['nbPages'])){
//    setcookie('nbPages',$_COOKIE['nbPages']+1);
//}else{
//    setcookie('nbPages',0, time() + 365*24*3600, null, null, false, true);
//}

//if(!isset($_COOKIE['nbArticles'])){
//    setcookie('nbArticles',0, time() + 365*24*3600, null, null, false, true);
//}


header('Content-Type: text/html; charset=UTF-8', true);
include('sql/connexion.php');


?>
<html lang="fr">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110425305-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-110425305-1');
    </script>

    <title>L'étiquette - Blog</title>

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

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

<div class="menu">
    <?php
    include('partials/menu.php');
    ?>
</div>


<?php
//if(isset($_SESSION['user']))
//var_dump($_SESSION['user']);
//
//if(isset($_SESSION['auto_log']))
//var_dump($_SESSION['auto_log']);
//?>


<div class="contenu">
    <div class="global_width">

        <div class="pop-up">
            <?php

            if (isset($_SESSION['flash']['success'])) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['flash']['success'];
                    ?></div>
                <?php
                unset($_SESSION['flash']['success']);
            }
            if (isset($_SESSION['flash']['error'])) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['flash']['error'];
                    ?></div>
                <?php
                unset($_SESSION['flash']['error']);
            }

            ?>
        </div>
        <?php
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 1:
                    include('partials/accueil.php');
                    break;
                case "article":
                    include('partials/article.php');
                    break;
                case 3:
                    include('partials/authentification.php');
                    break;
                case 4:
                    include('partials/inscription.php');
                    break;
                case 5:
                    include('partials/forget_password.php');
                    break;
                case "nos_valeurs":
                    include('partials/footer/nos_valeurs.php');
                    break;
                case "mentions_legales":
                    include('partials/footer/mentions_legales.php');
                    break;


            }
        } else {
            include('partials/accueil.php');
        }
        ?>
    </div>
</div>

<div id="footer">
    <?php include('partials/footer.php'); ?>
</div>
<script src="js/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

<script src="js/vicopo.api.js"></script>
<script src="js/villes_codepostal.js"></script>
<script src="js/unmask.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>


<script src="http://www.letiquette-blog.com//cookiechoices.js"></script>
<script>document.addEventListener('DOMContentLoaded', function (event) {
        cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'http://www.letiquette-blog.com/index.php?page=mentions_legales');
    });</script>

</body>
</html>