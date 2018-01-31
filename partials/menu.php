<div id="top-page">
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-xs-4 logo">
                <a href="accueil"><img src="assets/letiquette_logo_min.png" alt="L'étiquette logo"/></a>
            </div>
            <div class="col-sm-4 col-xs-4" id="searchBox">
                <form name="formsearch" action="index.php" method="get" id="formsearch">
                    <label class="searchLabel" for="searchInput">
                        <input type="text" name="search" id="searchInput" placeholder="Rechercher">
                        <span class="fa fa-search" onclick="navbarSearch()"></span>
                    </label>
                </form>
            </div>
            <div class="col-sm-4 col-xs-4 right-top-all">

                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <a href="mon_compte">
                        <span class="right-top">
                            <i class="fa fa-address-book-o"aria-hidden="true"></i>
                            <?php echo $_SESSION['user']['pseudo'] ?>
                        </span>
                    </a>
                <a href="sql/deconnexion.php"> <span class="right-top">
                        <i class="fa fa-user-times cercle" aria-hidden="true"></i>
                        <span class="right-name"> Déconnexion</span></span></a>
                    <?php
                } else {
                    ?>
                    <a href="inscription"><span class="right-top">
                            <i class="fa fa-pencil cercle" aria-hidden="true"></i>
                            <span class="right-name">Inscription</span></span>
                    </a>


                <a href="authentification"><span class="right-top">
                        <i class="fa fa-user cercle" aria-hidden="true"></i>
                        <span class="right-name">Connexion</span></span>
                </a><?php } ?>
            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-12" id="smallSearch">-->
<!--                <form name="formsearch" action="index.php" method="get" id="formsearch">-->
<!--                    <label class="searchLabel" for="searchInput">-->
<!--                        <input type="text" name="search" id="searchInput" placeholder="Rechercher">-->
<!--                        <span class="fa fa-search" onclick="navbarSearch()"></span>-->
<!--                    </label>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->

    </div>
</div>
