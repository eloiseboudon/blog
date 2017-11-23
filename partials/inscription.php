<div class="contenu">
    <div class="form-inscription">
        <div class="cercle"></div>
        <div class="ficelle"></div>

        <?php if (isset($_SESSION['erreur_inscription'])) {
            echo $_SESSION['erreur_inscription'];
        } ?>


        <form action="sql/inscription.php" method="post">
<!--                        <label for="nom"><span>Nom <span class="required">*</span></span><input type="text" class="input-field"-->
<!--                                                                                                name="nom"-->
<!--                                                                                                value="--><?php //if (isset($_SESSION['nom'])) {
//                                                                                                    echo $_SESSION['nom'];
//                                                                                                } ?><!-- " required="required"/></label>-->
<!--                        <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"-->
<!--                                                                                                      class="input-field"-->
<!--                                                                                                      name="prenom"-->
<!--                                                                                                      value="--><?php //if (isset($_SESSION['prenom'])) {
//                                                                                                          echo $_SESSION['prenom'];
//                                                                                                      } ?><!--"-->
<!--                                                                                                      required="required"/></label>-->
<!--                        <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"-->
<!--                                                                                                      class="input-field"-->
<!--                                                                                                      name="pseudo"-->
<!--                                                                                                      value="--><?php //if (isset($_SESSION['pseudo'])) {
//                                                                                                          echo $_SESSION['pseudo'];
//                                                                                                      } ?><!--"-->
<!--                                                                                                      required="required"/>-->
<!--                            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="popover" data-content="Le nom qui apparaîtra sur le site quand vous laissez des commentaires."></i></label>-->
<!--                        <label for="email"><span>Email <span class="required">*</span></span><input type="text" class="input-field"-->
<!--                                                                                                    name="email"-->
<!--                                                                                                    value="--><?php //if (isset($_SESSION['email'])) {
//                                                                                                        echo $_SESSION['email'];
//                                                                                                    } ?><!--"-->
<!--                                                                                                    required="required"/></label>-->
            <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="password"
                                                                                                  class="input-field"
                                                                                                  name="password"
                                                                                                  required="required"
                                                                                                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"/>
                <i class="fa fa-eye unmask" aria-hidden="true"></i></label>
            <span class="required password">8 caractères minimum comportant au moins une minuscule, une majuscule, un chiffre et un caractère spécial (@,!,?, ...)</span>
<!--            <label for="sexe"><span>Sexe<span class="required">*</span></span>-->
<!--                <div class="input-sexe">-->
<!--                    <input type="radio" name="sexe" value="F" id="femme" required="required"/> Femme-->
<!--                    <input type="radio" name="sexe" value="H" id="homme" required="required"/> Homme-->
<!--                    <input type="radio" name="sexe" value="N" id="neutre" required="required"/> Neutre-->
<!--                </div>-->
<!--            </label>-->
<!---->
<!--            <label for="date_anniversaire"><span>Date de naissance<span-->
<!--                            class="required">*</span></span><input type="date" class="input-field"-->
<!--                                                                   name="date_anniversaire"-->
<!--                                                                   value="--><?php //if (isset($_SESSION['date'])) {
//                                                                       echo $_SESSION['date'];
//                                                                   } ?><!--" required="required"/></label>-->
<!---->
<!---->
<!--            <label for="adresse"><span>Adresse <span class="required">*</span></span><input type="text"-->
<!--                                                                                            class="input-field"-->
<!--                                                                                            name="adresse"-->
<!--                                                                                            value="--><?php //if (isset($_SESSION['adresse'])) {
//                                                                                                echo $_SESSION['adresse'];
//                                                                                            } ?><!--" required="required"/></label>-->
<!---->
<!---->
<!--            <label for="code_postal"><span>Code postal <span class="required">*</span></span><input id="code"-->
<!--                                                                                                    type="text"-->
<!--                                                                                                    class="input-field"-->
<!--                                                                                                    name="code_postal"-->
<!--                                                                                                    value="--><?php //if (isset($_SESSION['code_postal'])) {
//                                                                                                        echo $_SESSION['code_postal'];
//                                                                                                    } ?><!--"-->
<!--                                                                                                    required="required"-->
<!--                                                                                                    autocomplete="off"-->
<!--                                                                                                    autofocus=""/></label>-->
<!---->
<!--            <label for="ville"><span>Ville <span class="required">*</span></span><input id="city" type="text"-->
<!--                                                                                        class="input-field"-->
<!--                                                                                        name="ville"-->
<!--                                                                                        value="--><?php //if (isset($_SESSION['ville'])) {
//                                                                                            echo $_SESSION['ville'];
//                                                                                        } ?><!--"-->
<!--                                                                                        required="required"-->
<!--                                                                                        autocomplete="off"></label>-->
<!---->
<!--            <section id="output"></section>-->
<!---->
<!---->
<!--            <label for="telephone"><span>Téléphone <span class="required">*</span></span><input type="text"-->
<!--                                                                                                class="input-field"-->
<!--                                                                                                name="telephone"-->
<!--                                                                                                value=" --><?php //if (isset($_SESSION['telephone'])) {
//                                                                                                    echo $_SESSION['telephone'];
//                                                                                                } ?><!--"-->
<!--                                                                                                required="required"/></label>-->
<!---->
<!--            <label for="cgu">-->
<!--                <input type="checkbox" value="cgu" name="validate[]" required="required"/> J'ai lu et j'accepte les-->
<!--                conditions générales d'utilisation <span class="required" style="float:none;">*</span>-->
<!--            </label>-->
<!---->
<!--            <label for="courrier">-->
<!--                <input type="checkbox" value="courrier" name="validate[]"/> J'accepte de recevoir des informations de-->
<!--                la-->
<!--                part de L'étiquette via courrier-->
<!--                électronique<br/>-->
<!--            </label>-->
<!---->
<!--            <div class="champs-obligatoires">-->
<!--                <span class="required">(*) : Champs obligatoires</span>-->
<!--            </div>-->

            <input type="submit" value="Valider"/>


        </form>
    </div>
</div>




