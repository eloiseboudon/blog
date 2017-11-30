<?php
//
//if (isset($_GET['code'])) {
//    $client->authenticate($_GET['code']);
//    $_SESSION['token'] = $client->getAccessToken();
//    echo "<script>alert('code')</script>";
//    header('Location: ' . filter_var(REDIRECT_URL, FILTER_SANITIZE_URL));
//}
//
//if (isset($_SESSION['token'])) {
//    $client->setAccessToken($_SESSION['token']);
//
//    echo "<script>alert('token')</script>";
//}
//
//if ($client->getAccessToken()) {
//
//    echo "<script>alert('token access')</script>";
//
//    $gpUserProfile = $google_oauthV2->userinfo->get();
//
//    $gpUserData = array(
//        'oauth_provider' => 'google',
//        'oauth_uid' => $gpUserProfile['id'],
//        'first_name' => $gpUserProfile['given_name'],
//        'last_name' => $gpUserProfile['family_name'],
//        'email' => $gpUserProfile['email'],
//        'gender' => $gpUserProfile['gender'],
//        'locale' => $gpUserProfile['locale'],
//        'picture' => $gpUserProfile['picture'],
//        'link' => $gpUserProfile['link'],
//        'birthday' => $gpUserProfile['birthday']
//    );
//    $user = checkUser($gpUserData);
//
//
//    if (!empty($user)) {
//
//
//        echo "<script>alert('user')</script>";
//        $_SESSION['user'] = $gpUserData;
//        $output = '<h1>Google+ Profile Details </h1>';
//        $output .= '<img src="' . $user['picture'] . '" width="300" height="220">';
//        $output .= '<br/>Google ID : ' . $user['oauth_uid'];
//        $output .= '<br/>Name : ' . $user['first_name'] . ' ' . $user['last_name'];
//        $output .= '<br/>Email : ' . $user['email'];
//        $output .= '<br/>Gender : ' . $user['gender'];
//        $output .= '<br/>Locale : ' . $user['locale'];
//        $output .= '<br/>Birthday : ' . $user['birthday'];
//        $output .= '<br/>Logged in with : Google';
//        $output .= '<br/><a href="' . $user['link'] . '" target="_blank">Click to Visit Google+ Page</a>';
////            $output .= '<br/>Logout from <a href="logout.php">Google</a>';
//    } else {
//        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
//    }
//} else {
//    $authUrl = $client->createAuthUrl();
//    $output = '<div class="google-signin"> <a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="assets/icones/google-signin/btn_google_signin_light_normal.png" alt=""/></a></div>';
//}
//
//
//
//
//
//
//
//function checkUser($user){
//
//    $email = $user['email'];
//    $bdd = connexion_sql();
//    $sql = "SELECT * FROM membres WHERE email ='$email'";
//    $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
//
//
//    if(empty($req)){
//        $nom = $user['last_name'];
//        $prenom = $user['first_name'];
//        $sexe = $user['gender'];
//        $date_anniversaire = $user['birthday'];
//
//
//        $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription, token, confirmation_token)
//VALUES ('$nom','$prenom','$prenom','','$email','$sexe','$date_anniversaire','','','','',NOW(),'google_account', 'google_acount')";
//        $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
//    }
//
//
//    return $req;
//
//}
//
//?>