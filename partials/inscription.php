<title>
    Inscription - L’étiquette - Blog mode éthique
    Chaque semaine retrouvez des articles fun et décalés sur le shopping responsable. Inscrivez-vous pour pouvoir
    laisser des commentaires et interagir avec la communauté !
</title>


<div class="contenu">

    <?php
    include_once 'auth/googlePlus_config.php';
    ?>


    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <!--        <div>--><?php //google_api();?><!--</div>-->

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

            <label for="date_anniversaire"><span>Date de naissance<span
                            class="required">*</span></span><input type="date" class="input-field"
                                                                   name="date_anniversaire"
                                                                   value="<?php if (isset($_SESSION['user'])) {
                                                                       echo $_SESSION['user']['date'];
                                                                   } ?>" required/>
            </label>


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
                la part de L'étiquette<br/>
            </label>

            <div class="champs-obligatoires">
                <span class="required">(*) : Champs obligatoires</span>
            </div>

            <input type="submit" value="Valider"/>

            <div>
                <?php
                if (!isset($_SESSION['connexion']))
                    google_api();
                ?>
            </div>

        </form>
    </div>
</div>


<?php

function google_api()
{
    include 'auth/googlePlus_config.php';
    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['token-google'] = $client->getAccessToken();
        header('Location: ' . filter_var(REDIRECT_URL, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['token'])) {
        $client->setAccessToken($_SESSION['token-google']);
    }

    if ($client->getAccessToken()) {
        $gpUserProfile = $google_oauthV2->userinfo->get();

        $gpUserData = array(
            'oauth_provider' => 'google',
            'oauth_uid' => $gpUserProfile['id'],
            'prenom' => htmlspecialchars($gpUserProfile['given_name']),
            'nom' => htmlspecialchars($gpUserProfile['family_name']),
            'email' => htmlspecialchars($gpUserProfile['email']),
            'gender' => $gpUserProfile['gender'],
            'birthday' => $gpUserProfile['birthday']
        );

        if ($gpUserData['gender'] == "female") {
            $gpUserData['gender'] = 'F';
        } elseif ($gpUserData['gender'] == "male") {
            $gpUserData['gender'] = 'H';
        } else {
            $gpUserData['gender'] = 'N';
        }


        if (!empty($gpUserData)) {
            $email = $gpUserData['email'];
            $bdd = connexion_sql();

            $sql = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE email ='$email'");
            $count_user = mysqli_fetch_array($sql);
            $count_user_exist = $count_user['count'];

            if ($count_user_exist == 0) {
                $nom = $gpUserData['nom'];
                $prenom = $gpUserData['prenom'];
                $sexe = $gpUserData['gender'];
                $date_anniversaire = $gpUserData['birthday'];
                $pseudo = explode('@', $email)[0];

                $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription)
VALUES ('$nom','$prenom','$pseudo','','$email','$sexe','$date_anniversaire','','','','',NOW())";
                $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
                $user_id = mysqli_insert_id($bdd);
                $sql2 = "INSERT INTO verifications (id_membre, derniere_connexion) VALUES('$user_id',NOW())";
                $req2 = $bdd->query($sql2) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
                $gpUserData['id'] = $user_id;
            } else {
                $sql = "SELECT * from membres WHERE email = '$email'";
                $req = $bdd->query($sql) or die ('Erreur SQL : ' . mysqli_error($bdd));
                $user = mysqli_fetch_array($req);

                $user_id = $user['id'];
                $sql3 = "UPDATE verifications SET derniere_connexion = NOW() WHERE id_membre ='$user_id'";
                $req3 = $bdd->query($sql3) or die ('Erreur SQL : ' . mysqli_error($bdd));

                $gpUserData['id'] = $user['id'];
                $pseudo = $user['pseudo'];
            }

            $gpUserData['pseudo'] = $pseudo;
            $_SESSION['connexion'] = "google";
            $_SESSION['user'] = $gpUserData;


            $_SESSION['flash']['success'] = "Vous êtes connecté grâce à votre compte Google.";
            $output = "";

            echo "<script type='text/javascript'>location.replace('index.php');</script>";
            exit();
        } else {
            $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
        }

    } else {
        $authUrl = $client->createAuthUrl();
        $output = '<div class="google-signin"> <a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-signin/btn_google_signin_light_normal.png" alt=""/></a></div>';
    }
    echo $output;
}


?>






