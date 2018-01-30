<div id="top-page">
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-xs-4 logo">
                <a href="/"><img src="assets/logo.png"/></a>
            </div>
            <div class="col-sm-4 col-xs-4" id="searchBox">
                <form name="formsearch" action="index.php" method="get">
                    <label id="searchLabel">
                        <input name="search" id="searchInput" placeholder="Rechercher">
                        <span class="fa fa-search" onclick="formsearch.submit()"></span>
                    </label>
                </form>
            </div>
            <div class="col-sm-4 col-xs-4 right-top-all">

                <?php
                if (isset($_SESSION['connexion'])) {
                    ?>
                    <a href="mon_compte">     <span id="right-top"><i
                                    class="fa fa-address-book-o"
                                    aria-hidden="true"></i>
                            <?php echo $_SESSION['user']['pseudo'] ?>
                            </span></a>
                <a href="sql/deconnexion.php"> <span id="right-top"><i class="fa fa-user-times cercle "
                                                                          aria-hidden="true"></i>
                                    Déconnexion</span></a>
                    <?php
                } else {
                    ?>
                    <a href="inscription"><span id="right-top"><i class="fa fa-pencil cercle"
                                                                  aria-hidden="true"></i>
                                    Inscription</span></a>


                <a href="authentification"><span id="right-top"><i class="fa fa-user cercle"
                                                                       aria-hidden="true"></i>
                                    Connexion</span> </a><?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="smallSearch">
                <form name="formsearch" action="index.php" method="get">
                    <label id="searchLabel">
                        <input name="search" type="text" id="searchInput" placeholder="Rechercher">
                        <span class="fa fa-search" onclick="formsearch.submit()"></span>
                    </label>
                </form>
            </div>
        </div>

    </div>
</div>
