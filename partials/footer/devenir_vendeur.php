<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <h1>Devenir vendeur</h1>
        <p>Nous somes en train de développer une marketplace de mode éthique. Vous souhaitez nous proposer des produits ? Merci de bien vouloir remplir le formulaire ci-dessous, nous vous
            recontacterons dans les plus brefs délais. </p>
        <p>
            A bientôt ! </p>


        <form action="sql/devenir_vendeur.php" method="post">
            <h2>Entreprise</h2>
            <label for="nom_entreprise"><span>Nom de l'entreprise<span class="required">*</span></span><input
                        type="text"
                        class="input-field"
                        name="nom_entreprise"
                        required/>
            </label>
            <label for="siret"><span>Numéro de SIRET<span class="required">*</span></span><input type="text"
                                                                                                 class="input-field"
                                                                                                 name="siret"
                                                                                                 required/>
            </label>
            <label for="tva"><span>Numéro de TVA<span class="required">*</span></span><input type="text"
                                                                                             class="input-field"
                                                                                             name="tva"
                                                                                             required/>
            </label>
            <label for="site_internet"><span>Site internet<span class="required">*</span></span><input type="text"
                                                                                                       class="input-field"
                                                                                                       name="site_internet"
                                                                                                       required/>
            </label>


            <h2>Contact principal</h2>

            <label for="nom"><span>Nom <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="nom"
                                                                                          required/>
            </label>

            <label for="prenom"><span>Prenom <span class="required">*</span></span><input type="text"
                                                                                          class="input-field"
                                                                                          name="prenom"
                                                                                          required/>
            </label>
            <label for="email"><span>Email <span class="required">*</span></span><input type="email"
                                                                                        class="input-field"
                                                                                        name="email"
                                                                                        required/>
            </label>

            <label for="telephone"><span>Téléphone <span class="required">*</span></span><input type="text"
                                                                                        class="input-field"
                                                                                        name="telephone"
                                                                                        required/>
            </label>
            <label for="message"><span>Votre message </span>
                <textarea name="message"></textarea>
            </label>


            <input type="submit" value="Envoyer"/>
        </form>

    </div>
</div>