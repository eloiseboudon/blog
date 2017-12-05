<div id="top-page">
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-xs-4 logo">
                <a href="/"><img src="assets/logo.png"/></a>
            </div>
            <div class="col-sm-4 col-xs-4" id="searchBox">
                <form name="formsearch" action="index.php" method="get">
                <label id="searchLabel">
                    <input name="search" type="text" id="searchInput" placeholder="Rechercher">
                    <span class="fa fa-search"  onclick="formsearch.submit()"></span>
                </label>
                </form>
            </div>
            <div class="col-sm-4 col-xs-4 right-top-all">
                <form id="small_form" name="formsearch" action="index.php" method="get">
                    <label id="searchLabel">
                        <input name="search" type="text" id="searchInput">
                        <span class="fa fa-search"  onclick="formsearch.submit()"></span>
                    </label>
                </form>

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
