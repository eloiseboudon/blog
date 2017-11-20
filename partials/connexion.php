<?php
    $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
?>

<div class="authentification_compte">
    <div class="cercle"></div>
    <div class="ficelle"></div>
    <div class="authentification_form">

        <form action="sql/authentification.php" method="get">

            <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="pseudo"
                                                                                          required="required"/></label>
            <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="text"
                                                                                                  class="input-field"
                                                                                                  name="password"
                                                                                                  required="required"/></label>
            <input type="submit" value="Valider"/>

        </form>

        <a href="index.php?page=4">Pas encore inscrit ?</a><br/>
        <a href="#">Mot de passe oublié</a>
    </div>
</div>


