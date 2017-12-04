<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>

        <form action="sql/mon_compte.php" method="post">



            <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="pseudo"
                                                                                          value="<?php if (isset($_SESSION['user'])) {
                                                                                              echo $_SESSION['user']['pseudo'];
                                                                                          } ?>"
                                                                                          required/>
                <i class="fa fa-info-circle" aria-hidden="true" data-toggle="popover"
                   data-content="Le nom qui apparaîtra sur le site quand vous laissez des commentaires."></i>            </label>

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
                                                                                                  value="<?php $psd = null;
                                                                                                  echo $psd;
                                                                                                  ?>"
                                                                                                  required
                                                                                                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"/>
                <i class="fa fa-eye unmask" aria-hidden="true"></i>
            </label>

            <span class="required password">8 caractères minimum comportant au moins une minuscule, une majuscule, un chiffre et un caractère spécial (@,!,?, ...)</span>



            <label for="adresse"><span>Adresse <span class="required">*</span></span><input type="text"
                                                                                            class="input-field"
                                                                                            name="adresse"
                                                                                            value="<?php if (isset($_SESSION['user'])) {
                                                                                                echo $_SESSION['user']['adresse'];
                                                                                            } ?>" required/>
            </label>


            <label for="code_postal"><span>Code postal <span class="required">*</span></span><input id="code"
                                                                                                    type="text"
                                                                                                    class="input-field"
                                                                                                    name="code_postal"
                                                                                                    value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['code_postal'];
                                                                                                    } ?>"
                                                                                                    required
                                                                                                    autocomplete="off"
                                                                                                    autofocus=""/>
            </label>

            <label for="ville"><span>Ville <span class="required">*</span></span><input id="city" type="text"
                                                                                        class="input-field"
                                                                                        name="ville"
                                                                                        value="<?php if (isset($_SESSION['user'])) {
                                                                                            echo $_SESSION['user']['ville'];
                                                                                        } ?>"
                                                                                        required
                                                                                        autocomplete="off">
            </label>

            <section id="output"></section>


            <label for="telephone"><span>Téléphone <span class="required">*</span></span><input type="text"
                                                                                                class="input-field"
                                                                                                name="telephone"
                                                                                                value=" <?php if (isset($_SESSION['user'])) {
                                                                                                    echo $_SESSION['user']['telephone'];
                                                                                                } ?>"
                                                                                                required/>
            </label>

            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LcdyjoUAAAAABiFnZBcA3njgi3Ke9aS1C4lKYbo"></div>
            </div>


            <label for="cgu">
                <input type="checkbox" value="cgu" name="validate[]" required/> J'ai lu et j'accepte les
                conditions générales d'utilisation <span class="required" style="float:none;">*</span>
            </label>

            <label for="courrier">
                <input type="checkbox" value="courrier" name="validate[]"/> J'accepte de recevoir des informations de
                la
                part de L'étiquette via courrier
                électronique<br/>
            </label>

            <div class="champs-obligatoires">
                <span class="required">(*) : Champs obligatoires</span>
            </div>

            <input type="submit" value="Valider"/>


        </form>
    </div>
</div>

