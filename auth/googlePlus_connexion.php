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



?>