<div class="inscription_compte">
    <h2>Inscription</h2>
    <div class="form-inscription">
    <div class="cercle"></div>
    <div class="ficelle"></div>



        <form action="sql/inscription.php" method="post">

            <label for="nom"><span>Nom <span class="required">*</span></span><input type="text" class="input-field"
                                                                                    name="nom"</label>
            <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="prenom"</label>
            <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="pseudo"</label>
            <label for="email"><span>Email <span class="required">*</span></span><input type="text" class="input-field"
                                                                                        name="email"</label>
            <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="text"
                                                                                                  class="input-field"
                                                                                                  name="password"</label>
            <p>
                <label for="sexe"><span>Sexe<span class="required">*</span></span></label>
                <input type="radio" name="sexe" value="femme" id="femme"/> Femme <br/>
                <input type="radio" name="sexe" value="homme" id="homme"/> Homme <br/>
                <input type="radio" name="sexe" value="neutre" id="neutre"/> Neutre
            </p>
            <label for="date_anniversaire"><span>Date de naissance (jj/mm/yyyy)<span
                            class="required">*</span></span><input type="text" class="input-field"
                                                                   name="date_anniversaire"</label>


            <label for="adresse"><span>Adresse <span class="required">*</span></span><input type="text"
                                                                                                  class="input-field"
                                                                                                  name="adresse"</label>
            <label for="code_postal"><span>Code postal <span class="required">*</span></span><input type="text"
                                                                                            class="input-field"
                                                                                            name="code_postal"</label>

            <label for="telephone"><span>Téléphone <span class="required">*</span></span><input type="text"
                                                                                            class="input-field"
                                                                                            name="telephone"</label>

            <label><span>&nbsp;</span><input type="submit" value="Submit"/></label>

        </form>
    </div>
</div>

