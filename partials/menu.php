<div id="top-page">
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-xs-4 logo">
                <a href="/"><img src="assets/logo.png"/></a>
            </div>
            <div class="col-sm-4 col-xs-4" id="searchBox">
                <form action="sql/search.php" method="get">
                <label id="searchLabel">
                    <input name="search" type="text" id="searchInput" placeholder="Rechercher">
                    <span class="fa fa-search"></span>
                </label>
                </form>
            </div>
            <div class="col-sm-4 col-xs-4 right-top-all">
                <span class="smallSearchBox" id="right-top"><a href="#"><i class="fa fa-search cercle" aria-hidden="true"></i> Search</a></span>

                <?php
                if (isset($_SESSION['connexion'])) {
                    ?>
                    <span id="right-top"><a href="index.php?page=mon_compte"><i
                                    class="fa fa-address-book-o"
                                    aria-hidden="true"></i>
                            <?php echo $_SESSION['user']['pseudo'] ?></a>
                            </span>
                    <span id="right-top"><a href="sql/deconnexion.php"><i class="fa fa-user-times cercle "
                                                                          aria-hidden="true"></i>
                                    Déconnexion</a></span>
                    <?php
                } else {
                    ?>
                    <span id="right-top"><a href="index.php?page=4"><i class="fa fa-pencil cercle"
                                                                       aria-hidden="true"></i>
                                    Inscription</a></span>


                    <span id="right-top"><a href="index.php?page=3"><i class="fa fa-user cercle"
                                                                       aria-hidden="true"></i>
                                    Connexion</a></span> <?php } ?>
            </div>
        </div>
    </div>
</div>


<!--<nav class="menu" id="menu" xmlns="http://www.w3.org/1999/html">-->
<!--    <div class="menu-item logo"><a href="/"><img src="assets/logo.png"></a></div>-->
<!---->
<!--    <div id="acceuil" class="menu-item"><a href="/">Accueil</a></div>-->
<!--    <div class="search">-->
<!--        <label id="searchLabel">-->
<!--            <input id="searchInput" placeholder="Rechercher" type="text">-->
<!--            <span class="fa fa-search"></span>-->
<!--        </label>-->
<!--    </div>-->
<!--    <div id="grand-ecran" class="menu-right">-->
<!--        --><?php
//        if (isset($_SESSION['connexion'])) {
////            if ($_COOKIE['isConnect'] == 1 || $_SESSION['connexion'] == "google") {
//            ?>
<!--            <div class="menu-item menu-item-right menu-pseudo"><a href="index.php?page=mon_compte"><i-->
<!--                            class="fa fa-address-book-o"-->
<!--                            aria-hidden="true"></i>-->
<!--                    --><?php //echo $_SESSION['user']['pseudo'] ?><!--</a>-->
<!--            </div>-->
<!--            <div class="menu-item menu-item-right"><a href="sql/deconnexion.php"><i class="fa fa-user-times  "-->
<!--                                                                                    aria-hidden="true"></i>-->
<!--                    Déconnexion</a></div>-->
<!--            --><?php
//        } else {
//            ?>
<!--            <div class="menu-item menu-item-right"><a href="index.php?page=4"><i class="fa fa-pencil"-->
<!--                                                                                 aria-hidden="true"></i>-->
<!--                    Inscription</a></div>-->
<!---->
<!---->
<!--            <div class="menu-item menu-item-right"><a href="index.php?page=3"><i class="fa fa-user"-->
<!--                                                                                 aria-hidden="true"></i>-->
<!--                    Connexion</a></div> --><?php //} ?>
<!--    </div>-->
<!---->
<!--    <div id="petit-ecran" class="menu-right">-->
<!--        --><?php
//        if (isset($_SESSION['connexion'])) {
////            if ($_COOKIE['isConnect'] == 1 || $_SESSION['connexion'] == "google") {
//            ?>
<!--            <div class="menu-item menu-item-right"><a href="index.php?page=mon_compte"><i-->
<!--                            class="fa fa-address-book-o"-->
<!--                            aria-hidden="true"></i></a></div>-->
<!---->
<!--            <div class="menu-item menu-item-right"><a href="sql/deconnexion.php"><i class="fa fa-user-times"-->
<!--                                                                                    aria-hidden="true"></i></a>-->
<!--            </div>-->
<!---->
<!--            --><?php
//        } else {
//            ?>
<!---->
<!--            <div class="menu-item menu-item-right"><a href="index.php?page=4"><i class="fa fa-pencil"-->
<!--                                                                                 aria-hidden="true"></i></a></div>-->
<!---->
<!---->
<!--            <div class="menu-item menu-item-right"><a href="index.php?page=3"><i class="fa fa-user"-->
<!--                                                                                 aria-hidden="true"></i></a></div>-->
<!--        --><?php //} ?>
<!---->
<!--    </div>-->
<!---->
<!--</nav>-->