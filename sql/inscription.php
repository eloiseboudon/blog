<?php
include('connexion.php');

if (isset($_POST['nom'])) {

    $bdd = connexion_sql();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sexe = $_POST['sexe'];

    $date_anniversaire = $_POST['date_anniversaire'];
    $date_anniversaire_format = DateTime::createFromFormat('d/m/Y', $date_anniversaire)->format('Y-m-d');

    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $telephone = $_POST['telephone'];

    $pass_hache = sha1($_POST['password']);

    $checkbox = array();
    $checkbox = $_POST['validate'];
//    $cgu = $checkbox[0];

    if (count($checkbox) != 1) {
        $courrier = 1;
    } else {
        $courrier = 0;
    }

    $sql_check_mail = "SELECT * FROM membres WHERE email='$email'";
    $check_mail = $bdd->query($sql_check_mail);
    $sql_check_pseudo = "SELECT * FROM membres WHERE pseudo='$pseudo'";
    $check_pseudo = $bdd->query($sql_check_pseudo);


    if (mysqli_num_rows($check_mail) > 0) {
        $GLOBALS['erreur_inscription']="Cet email est deja utilisé";
        ?>

        Cet email est déjà utilisé,
        <a href="../index.php?page=4">Se réinscrire </a>
<!--        Veuillez en saisir un nouveau :-->
<!--        <form action="inscription.php" method="post">-->
<!--            <label for="email"><span>Email</span><input type="text" class="input-field"-->
<!--                                                        name="email"-->
<!--                                                        required="required"/></label>-->
<!--            <input type="submit" value="Valider"/>-->
<!---->
<!--        </form>-->
<!--        --><?php
//        $email = $_POST['email'];
//        $sql_check_mail = "SELECT * FROM membres WHERE email='$email'";
//        $check_mail = $bdd->query($sql_check_mail);



    } elseif (mysqli_num_rows($check_pseudo) > 0) {

        $GLOBALS['erreur_inscription']="Ce pseudo est deja utilisé";
        ?>
        Ce pseudo est déjà utilisé,
        <a href="../index.php?page=4">Se réinscrire </a>
<!--        Veuillez en saisir un nouveau :-->
<!--        <form action="inscription.php" method="post">-->
<!--            <label for="pseudo"><span>Pseudo </span><input type="text" class="input-field"-->
<!--                                                           name="pseudo"-->
<!--                                                           required="required"/></label>-->
<!--            <input type="submit" value="Valider"/>-->
<!---->
<!--        </form>-->
<!--        --><?php
//        $pseudo = $_POST['pseudo'];
//        $sql_check_pseudo = "SELECT * FROM membres WHERE pseudo='$pseudo'";
//        $check_pseudo = $bdd->query($sql_check_pseudo);
    } elseif (mysqli_num_rows($check_mail) > 0 && mysqli_num_rows($check_pseudo) > 0) {
        echo "Cet email et ce psuedo sont déjà utilisés.";
    } elseif (mysqli_num_rows($check_mail) == 0 && mysqli_num_rows($check_pseudo) == 0) {
        $sql = "INSERT INTO membres (nom, prenom, pseudo, password, email,sexe,date_anniversaire, adresse,code_postal,telephone,recevoir_mail,date_inscription)
VALUES ('$nom','$prenom','$pseudo','$password','$email','$sexe','$date_anniversaire_format','$adresse','$code_postal','$telephone','$courrier' ,NOW())";
        $req = $bdd->query($sql) or die (mysqli_errno($bdd) . ' : ' . mysqli_error($bdd));
    } else {
        echo "erreur";
    }
}

?>
