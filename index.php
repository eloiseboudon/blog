<!DOCTYPE html>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//if (!isset($_COOKIE['isConnect'])) {
//    setcookie('isConnect', 0, time() + 365 * 24 * 3600, "/", null, false, true);
//} else {
//    if ($_COOKIE['isConnect'] != 3 || $_COOKIE['isConnect'] == 0 || $_COOKIE['isConnect'] == 1 || (isset($_SESSION['connexion']) && $_SESSION['connexion'] == "google")) {
//        if (isset($_SESSION['user']['pseudo'])) {
//            setcookie('pseudo', $_SESSION['user']['pseudo'], time() + 365 * 24 * 3600, "/", null, false, true);
//            setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");
//        } else {
//            setcookie('isConnect', 2, time() + 365 * 24 * 3600, "/");
//        }
//    }
//}
//
//if (isset($_COOKIE['isConnect'])) {
//    if ($_COOKIE['isConnect'] != 1 && $_COOKIE['isConnect'] != 3) {
//        if ($_COOKIE['isConnect'] == 2 && isset($_COOKIE['pseudo'])) {
//            include('sql/authentification_auto.php');
//        }
//    }
//}


header('Content-Type: text/html; charset=UTF-8', true);
include('sql/connexion.php');


//require 'auth/googlePlus_config.php';


?>
<html lang="fr">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110425305-1"></script> -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111135520-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-111135520-1');
    </script>

    <base href="/">


    <meta name="author" content="L'étiquette"/>
    <meta name="description"
          content="Retrouvez des articles fun et décalés sur le shopping responsable. Chaque semaine, apprenez-en un peu
           plus sur les alternatives au cuir animal, les matières recyclées, le coton bio, les modes de production, ce qui
            se cache derrière le made in France, et plein d’autres facettes de la mode éthique."/>
    <meta name="viewport" content="width=device-width"/>
    <meta property="og:image" content="http://dev.letiquette-blog.com/assets/Miniature.jpg"/>

    <title>L’étiquette - Blog mode éthique</title>

    <link rel="icon" href="assets/Miniature.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link href="css/main.min.css" type="text/css" rel="stylesheet"/>
    <link href="css/etiquettes.min.css" type="text/css" rel="stylesheet"/>
    <link href="css/timeline.min.css" type="text/css" rel="stylesheet"/>

    <script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body>


<?php
//if (isset($_SESSION['user']))
//    var_dump($_SESSION['user']);
//echo $_COOKIE['isConnect'];
//echo $_SESSION['connexion'];
//
//if(isset($_SESSION['auto_log']))
//var_dump($_SESSION['auto_log']);


//session_start();
//foreach ($_SESSION as $key => $value) {
//    print $key . " = " . $value . "<br>";
//}


//if(isset($_SESSION['access_token'])){
//    var_dump($_SESSION['access_token']);
//}
?>


<div class="contenu">
    <div class="global_width">

        <?php

        include('landingPage.php');

        ?>
    </div>
</div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

<!--<script src="js/vicopo.api.js"></script>-->
<!--<script src="js/villes_codepostal.js"></script>-->
<script src="js/app.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>


<script src="https://www.dev.letiquette-blog.com/cookiechoices.js"></script>
<script>document.addEventListener('DOMContentLoaded', function (event) {
        cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'http://www.letiquette-blog.com/index.php?page=mentions_legales');
    });</script>

</body>
</html>