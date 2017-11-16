<!DOCTYPE html>
<?php include('sql/connexion.php'); ?>
<html lang="fr">
<head>

    <!--    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>-->

    <title>L'étiquette - Blog</title>

    <meta name="author" content="Eloïse Boudon"/>
    <meta name="keywords" content="L'étiquette, blog, éthique"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width" />

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

<?php session_start();?>
<div class="menu">

    <?php
    include('partials/menu.php');
    header('Content-Type: text/html; charset=UTF-8', true);
    ?>
</div>



<div class="contenu">
    <div class="global_width">
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
                    include('partials/connexion.php');
                    break;
                case 4:
                    include('partials/inscription.php');
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



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
        integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
</body>
</html>