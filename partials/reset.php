<?php
if (isset($_GET['id']) && isset($_GET['token'])) {

    ?>

    <div class="contenu">
        <div class="form-etiquette">
            <div class="cercle"></div>
            <div class="ficelle"></div>
            <h1>Choix d'un nouveau mot de passe</h1>
            <form action="sql/reset.php" method="post">
                <label for="password"><span>Mot de passe </span><input
                            type="password"
                            class="input-field"
                            name="password"
                            required
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
                    <i class="fa fa-eye unmask" aria-hidden="true"></i>
                </label>
                <span class="required password">8 caractères minimum comportant au moins une minuscule, une majuscule, un chiffre et un caractère spécial (@,!,?, ...)</span>

                <input name="id" type="hidden" value="<?php echo $_GET['id'] ?>">
                <input name="token" type="hidden" value="<?php echo $_GET['token'] ?>">


                <label></label>
                <input type="submit" value="Valider"/>
            </form>
        </div>
    </div>
<?php } else {
    session_start();
    $_SESSION['flash']['error'] = "Une erreur à eu lieu, veuillez recommencer s'il vous plait.";
    header('Location: ../index.php?page=5');
    exit();
}