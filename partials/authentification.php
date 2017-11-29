<div class="contenu">

    <?php
    include_once 'auth/googlePlus_config.php';

    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['token'] = $client->getAccessToken();
        header('Location: ' . filter_var(REDIRECT_URL, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['token'])) {
        $client->setAccessToken($_SESSION['token']);
    }

    if ($client->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();

    //        //Initialize User class
    //        $user = new User();
    //
    //        //Insert or update user data to the database
    //        $gpUserData = array(
    //            'oauth_provider'=> 'google',
    //            'oauth_uid'     => $gpUserProfile['id'],
    //            'first_name'    => $gpUserProfile['given_name'],
    //            'last_name'     => $gpUserProfile['family_name'],
    //            'email'         => $gpUserProfile['email'],
    //            'gender'        => $gpUserProfile['gender'],
    //            'locale'        => $gpUserProfile['locale'],
    //            'picture'       => $gpUserProfile['picture'],
    //            'link'          => $gpUserProfile['link']
    //        );
    //        $userData = $user->checkUser($gpUserData);
    //
    //        //Storing user data into session
    //        $_SESSION['userData'] = $userData;
    //
    //        //Render facebook profile data
    //        if(!empty($userData)){
    //            $output = '<h1>Google+ Profile Details </h1>';
    //            $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
    //            $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
    //            $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
    //            $output .= '<br/>Email : ' . $userData['email'];
    //            $output .= '<br/>Gender : ' . $userData['gender'];
    //            $output .= '<br/>Locale : ' . $userData['locale'];
    //            $output .= '<br/>Logged in with : Google';
    //            $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
    //            $output .= '<br/>Logout from <a href="logout.php">Google</a>';
    //        }else{
    //            $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    //        }
    //    } else {
    //        $authUrl = $gClient->createAuthUrl();
    //        $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
        }

    $authUrl = $client->createAuthUrl();

    $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-plus-carre.png" alt=""/></a>'; ?>
    <div><?php echo $output; ?></div>


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
        </div>
    </div>
</div>

