<nav class="menu" id="menu" xmlns="http://www.w3.org/1999/html">
    <div class="menu-item logo"><a href="/"><img src="assets/logo.png"></a></div>

    <div id="acceuil" class="menu-item"><a href="/">Accueil</a></div>
    <div id="grand-ecran" class="menu-right">
        <?php
        if (isset($_SESSION['connexion'])){
//            if ($_COOKIE['isConnect'] == 1 || $_SESSION['connexion'] == "google") {
                ?>
                <div class="menu-item menu-item-right menu-pseudo"><a href="index.php?page=mon_compte"><i
                                class="fa fa-address-book-o"
                                aria-hidden="true"></i>
                        <?php echo $_SESSION['user']['pseudo'] ?></a>
                </div>
                <div class="menu-item menu-item-right"><a href="sql/deconnexion.php"><i class="fa fa-user-times  "
                                                                                        aria-hidden="true"></i>
                        Déconnexion</a></div>
                <?php
            } else {
                ?>
                <div class="menu-item menu-item-right"><a href="index.php?page=4"><i class="fa fa-pencil"
                                                                                     aria-hidden="true"></i>
                        Inscription</a></div>


                <div class="menu-item menu-item-right"><a href="index.php?page=3"><i class="fa fa-user"
                                                                                     aria-hidden="true"></i>
                        Connexion</a></div> <?php } ?>
    </div>

    <div id="petit-ecran" class="menu-right">
        <?php
        if (isset($_SESSION['connexion'])){
//            if ($_COOKIE['isConnect'] == 1 || $_SESSION['connexion'] == "google") {
                ?>
                <div class="menu-item menu-item-right"><a href="index.php?page=mon_compte"><i
                                class="fa fa-address-book-o"
                                aria-hidden="true"></i></a></div>

                <div class="menu-item menu-item-right"><a href="sql/deconnexion.php"><i class="fa fa-user-times"
                                                                                        aria-hidden="true"></i></a>
                </div>

                <?php
            } else {
                ?>

                <div class="menu-item menu-item-right"><a href="index.php?page=4"><i class="fa fa-pencil"
                                                                                     aria-hidden="true"></i></a></div>


                <div class="menu-item menu-item-right"><a href="index.php?page=3"><i class="fa fa-user"
                                                                                     aria-hidden="true"></i></a></div>
            <?php } ?>

    </div>

</nav>