<!DOCTYPE html>
<?php include('sql/connexion.php'); ?>
<html>
<head lang="fr">
    <meta charset="utf-8"/>
    <title>L'étiquette - Blog</title>
    <link href="style.css" rel="stylesheet"/>
</head>

<body>
    <div id="contenu">
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

    <div id="footer">

       L'étiquette - blablabla
    </div>



</body>
</html>