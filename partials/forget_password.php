<div class="contenu">
    <div class="form-authentification">
        <div class="cercle"></div>
        <div class="ficelle"></div>

        <div class="mdp_oublie_form">

            <form action="sql/forget_password.php" method="post">

                <label for="email"><span>Email </span><input type="email" class="input-field"
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