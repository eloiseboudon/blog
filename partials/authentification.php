<div class="contenu">


    <div class="form-authentification">
        <div class="cercle"></div>
        <div class="ficelle"></div>
        <?php


        if (isset($_SESSION['flash']['success'])) {
            ?>
            <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['flash']['success'];
            ?></div><?php
        } elseif (isset($_SESSION['flash']['error'])) {
            ?>
            <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['flash']['error'];
            ?></div><?php
            $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
        } else {
            $_SESSION['page_prec'] = $_SERVER['HTTP_REFERER'];
        }

        ?>
        <div class="authentification_form">

            <form action="sql/authentification.php" method="post">

                <label for="pseudo"><span>Pseudo <span class="required">*</span></span><input type="text"
                                                                                              class="input-field"
                                                                                              name="pseudo"
                                                                                              value="<?php if (isset($_SESSION['user']['pseudo'])) {
                                                                                                  echo $_SESSION['user']['pseudo'];
                                                                                              } ?>"
                                                                                              required="required"/></label>
                <label for="password"><span>Mot de passe <span class="required">*</span></span><input type="password"
                                                                                                      class="input-field"
                                                                                                      name="password"
                                                                                                      required="required"/>
                    <i class="fa fa-eye unmask" aria-hidden="true"></i>
                </label>
                <input type="submit" value="Valider"/>

            </form>

            <a href="index.php?page=4">Pas encore inscrit ?</a><br/>
            <a href="index.php?page=5">Mot de passe oublié</a>
            <?php
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
                    'first_name' => $gpUserProfile['given_name'],
                    'pseudo' => $gpUserProfile['given_name'],
                    'last_name' => $gpUserProfile['family_name'],
                    'email' => $gpUserProfile['email'],
                    'gender' => $gpUserProfile['gender'],
                    'locale' => $gpUserProfile['locale'],
                    'picture' => $gpUserProfile['picture'],
                    'link' => $gpUserProfile['link'],
                    'birthday' => $gpUserProfile['birthday']
                );

                if (!empty($gpUserData)) {
                    $email = $gpUserData['email'];
                    $bdd = connexion_sql();

                    $sql = $bdd->query("SELECT COUNT(*) AS count FROM membres WHERE email ='$email'");
                    $count_user = mysqli_fetch_array($sql);
                    $count_user_exist = $count_user['count'];

                    if ($count_user_exist == 0) {
                        $nom = $gpUserData['last_name'];
                        $prenom = $gpUserData['first_name'];
                        $sexe = $gpUserData['gender'];
                        $date_anniversaire = $gpUserData['birthday'];

                        $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription, token, confirmation_token)
VALUES ('$nom','$prenom','$prenom','','$email','$sexe','$date_anniversaire','','','','',NOW(),'google_account', 'google_account')";
                        $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
                    }

                    $_SESSION['connexion'] = "google";
                    $_SESSION['user'] = $gpUserData;

                    $_SESSION['flash']['success'] = "Vous êtes connecté avec votre compte google.";
//                    setcookie('isConnect', 1, time() + 365 * 24 * 3600, "/");

                    $output .= "";

                    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

                    exit();
                } else {
                    $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
                }
            } else {
                $authUrl = $client->createAuthUrl();
                $output = '<div class="google-signin"> <a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-signin/btn_google_signin_light_normal.png" alt=""/></a></div>';
            }
            ?>

            <div><?php echo $output; ?></div>
        </div>
    </div>
</div>





