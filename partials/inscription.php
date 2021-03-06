<title>
    Inscription - L’étiquette - Blog mode éthique

</title>
<meta name="description" content="Chaque semaine retrouvez des articles fun et décalés sur le shopping responsable. Inscrivez-vous pour pouvoir
    laisser des commentaires et interagir avec la communauté !">

<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>

        <?php
//        include 'auth/googlePlus_config.php';


        if (isset($authUrl)) {
            echo '<div class="google-signin"> <a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-signin/btn_google_signin_light_normal.png" /></a></div>';
        }
        ?>

        <form action="sql/inscription.php" method="post">
            <label for="nom"><span>Nom <span class="required">*</span></span><input type="text"
                                                                                    class="input-field"
                                                                                    name="nom"
                                                                                    value="<?php if (isset($_SESSION['user'])) {
                                                                                        echo $_SESSION['user']['nom'];
                                                                                    } ?>"
                                                                                    required/>
            </label>

            <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="prenom"
                                                                                          value="<?php if (isset($_SESSION['user'])) {
                                                                                              echo $_SESSION['user']['prenom'];
                                                                                          } ?>"
                                                                                          required/>
            </label>


            <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="pseudo"
                                                                                          value="<?php if (isset($_SESSION['user'])) {
                                                                                              echo $_SESSION['user']['pseudo'];
                                                                                          } ?>"
                                                                                          required/>
                <i class="fa fa-info-circle" aria-hidden="true" data-toggle="popover"
                   data-content="Le nom qui apparaîtra sur le site quand vous laissez des commentaires."></i>
            </label>

            <label for="email"><span>Email <span class="required">*</span></span><input type="email" class="input-field"
                                                                                        name="email"
                                                                                        value="<?php if (isset($_SESSION['user'])) {
                                                                                            echo $_SESSION['user']['email'];
                                                                                        } ?>"
                                                                                        required/>
            </label>

            <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="password"
                                                                                                  class="input-field"
                                                                                                  name="password"
                                                                                                  required
                                                                                                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"/>
                <i class="fa fa-eye unmask" aria-hidden="true"></i>
            </label>

            <span class="required password">8 caractères minimum comportant au moins une minuscule, une majuscule, un chiffre et un caractère spécial (@,!,?, ...)</span>
            <label for="sexe"><span>Sexe<span class="required">*</span></span> <br>
                <div class="input-sexe">
                    <input type="radio" name="sexe" value="F" id="femme" required/> Femme <br>
                    <input type="radio" name="sexe" value="H" id="homme" required/> Homme <br>
                    <input type="radio" name="sexe" value="N" id="neutre" required/> Neutre
                </div>
            </label>

            <label for="date_anniversaire"><span>Date d'anniversaire<span
                            class="required">*</span></span><input type="date" class="input-field"
                                                                   name="date_anniversaire"
                                                                   value="<?php if (isset($_SESSION['user'])) {
                                                                       echo $_SESSION['user']['date'];
                                                                   } ?>" required/>
            </label>


            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LcdyjoUAAAAABiFnZBcA3njgi3Ke9aS1C4lKYbo"></div>
            </div>


            <label for="cgu">
                <input type="checkbox" value="cgu" name="validate[]" required/> J'ai lu et j'accepte les <a href="cgu">
                    conditions générales d'utilisation </a> <span class="required" style="float:none;">*</span>
            </label>

            <label for="courrier">
                <input type="checkbox" value="courrier" name="validate[]"/> J'accepte de recevoir des informations de
                la part de L'étiquette<br/>
            </label>

            <div class="champs-obligatoires">
                <span class="required">(*) : Champs obligatoires</span>
            </div>

            <input type="submit" value="Valider"/>




        </form>
    </div>
</div>
