<div class="inscription_compte">
    <div class="form-inscription">
        <div class="cercle"></div>
        <div class="ficelle"></div>

<?php if(isset($GLOBALS['erreur_inscription'])){
    echo $GLOBALS['erreur_inscription'];
}?>


        <form action="sql/inscription.php" method="post">
            <label for="nom"><span>Nom <span class="required">*</span></span><input type="text" class="input-field"
                                                                                    name="nom" required="required"/></label>
            <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="prenom" required="required"/></label>
            <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="pseudo" required="required"/></label>
            <label for="email"><span>Email <span class="required">*</span></span><input type="text" class="input-field"
                                                                                        name="email" required="required"/></label>
            <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="text"
                                                                                                  class="input-field"
                                                                                                  name="password" required="required"/></label>

            <label for="sexe"><span>Sexe<span class="required">*</span></span>
                <div class="input-sexe">
                    <input type="radio" name="sexe" value="F" id="femme" required="required"/> Femme
                    <input type="radio" name="sexe" value="H" id="homme" required="required"/> Homme
                    <input type="radio" name="sexe" value="N" id="neutre" required="required"/> Neutre
                </div>
            </label>

            <label for="date_anniversaire"><span>Date de naissance (jj/mm/yyyy)<span
                            class="required">*</span></span><input type="text" class="input-field"
                                                                   name="date_anniversaire" required="required"/></label>


            <label for="adresse"><span>Adresse <span class="required">*</span></span><input type="text"
                                                                                            class="input-field"
                                                                                            name="adresse" required="required"/></label>
            <label for="code_postal"><span>Code postal <span class="required">*</span></span><input type="text"
                                                                                                    class="input-field"
                                                                                                    name="code_postal"/></label>

            <label for="telephone"><span>Téléphone <span class="required">*</span></span><input type="text"
                                                                                                class="input-field"
                                                                                                name="telephone" required="required"/></label>

            <label for="cgu">
                <input type="checkbox" value="cgu" name="validate[]" required="required"/>J'ai lu et j'accepte les conditions générales d'utilisation<br/>
            </label>

            <label for="courrier">
                <input type="checkbox" value="courrier" name="validate[]"/>J'accepte de recevoir des informations de la part de L'étiquette via courrier
                électronique<br/>
            </label>

            <div class="champs-obligatoires">
                <span class="required">(*) : Champs obligatoires</span>
<!--            </div>-->

            <input type="submit" value="Valider"/>


        </form>
    </div>
</div>

