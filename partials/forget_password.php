<div class="contenu">
    <div class="form-mdp_oublie">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <?php
        if(isset( $_SESSION['flash']['error-user'])){?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['flash']['error-user'];
            ?></div><?php
        }
        ?>

        <div class="mdp_oublie_form">

            <form action="sql/forget_password.php" method="post">

                <label for="email"><span>Email <span class="required">*</span></span><input type="text" class="input-field"
                                                                                            name="email"
                                                                                            value="<?php if (isset($_SESSION['email'])) {
                                                                                                echo $_SESSION['email'];
                                                                                            } ?>"
                                                                                            required/>
                </label>
                <input type="submit" value="Valider"/>

            </form>
        </div>
    </div>
</div>