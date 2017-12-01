<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <h1>Contactez-nous</h1>
        <p>Nous sommes à votre écoute : vous pouvez nous contacter via le fomulaire ci-dessous.<br />
            Nous ferons notre possible pour vous satisfaire dans les plus bref délais. </p>
        <p>
            A bientôt ! </p>


        <form action="sql/contactez_nous.php" method="post">
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
            <label for="email"><span>Email <span class="required">*</span></span><input type="email" class="input-field"
                                                                                        name="email"
                                                                                        value="<?php if (isset($_SESSION['user'])) {
                                                                                            echo $_SESSION['user']['email'];
                                                                                        } ?>"
                                                                                        required/>
            </label>
            <label for="demande"><span>Votre demande concerne</span><select name="demande">
                    <option value="informations_generales">Informations générales</option>
                    <option value="problemes_techniques">Problèmes techniques</option>
                    <option value="partenariat_offresServices">Partenariat / offres de services</option>
                </select>
            </label>

            <label for="commentaire"><span>Votre commentaire <span class="required">*</span></span>
                <textarea name="commentaire" required></textarea>
            </label>


            <input type="submit" value="Envoyer"/>
        </form>

    </div>
</div>