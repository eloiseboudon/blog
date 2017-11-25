<div class="contenu">
    <div class="form-authentification">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <?php


        if(isset($_SESSION['flash']['success'])){?>
            <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['flash']['success'];
            ?></div><?php
        }elseif(isset($_SESSION['flash']['error'])){?>
            <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['flash']['error'];
            ?></div><?php
            $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
        }
        else {
            $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
        }

        ?>
        <div class="authentification_form">

            <form action="sql/authentification.php" method="post">

                <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                              class="input-field"
                                                                                              name="pseudo" value="<?php if (isset($_SESSION['pseudo'])) {
                        echo $_SESSION['pseudo'];
                    } ?>"
                                                                                              required="required"/></label>
                <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="password"
                                                                                                      class="input-field"
                                                                                                      name="password"
                                                                                                      required="required"/>
                    <i class="fa fa-eye unmask" aria-hidden="true" ></i>
                </label>
                <input type="submit" value="Valider"/>

            </form>

            <a href="index.php?page=4">Pas encore inscrit ?</a><br/>
            <a href="index.php?page=5">Mot de passe oublié</a>
        </div>
    </div>
</div>

