<!DOCTYPE html>
<?php include('sql/connexion.php'); ?>
<html>
<head lang="fr">
    <meta charset="utf-8"/>
    <title>L'étiquette - Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link href="css/style.css" rel="stylesheet"/>
</head>

<body>
    <div id="body-position">
        <div class="barre_menu">
            <?php include('partials/menu.php');?>
        </div>

        <div class="contenu">
            <div class="global_width">
            <?php
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 1:
                        include('partials/accueil.php');
                        break;
                    case 2:
                        include('partials/article.php');
                        break;


                }
            } else {
                include('partials/accueil.php');
            }
            ?>
            </div>
        </div>
        <div id="footer">
           <?php include ('partials/footer.php'); ?>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>