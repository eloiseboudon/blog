<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>

        <!--        <form id="mon_compte" action="sql/mon_compte.php" method="post">-->

        <label><span>Nom </span><span class="compte_infos"><?php if (isset($_SESSION['user']['nom'])) {
                    echo $_SESSION['user']['nom'];
                } ?></span>
        </label>
        <label><span>Prénom </span><span class="compte_infos"><?php if (isset($_SESSION['user']['prenom'])) {
                    echo $_SESSION['user']['prenom'];
                } ?></span>
        </label>
        <label><span>Pseudo </span><span class="compte_infos"><?php if (isset($_SESSION['user']['pseudo'])) {
                    echo $_SESSION['user']['pseudo'];
                } ?></span>
        </label>

        <label><span>Email </span><span class="compte_infos"><?php if (isset($_SESSION['user']['email'])) {
                    echo $_SESSION['user']['email'];
                } ?></span><?php if ($_SESSION['connexion'] == "site") { ?>
                <i id="modal_update_email" class="fa fa-pencil-square-o" aria-hidden="true"
                   style="font-size:20px;color:#880015;"></i><?php } ?>
        </label>

        <?php if (isset($_SESSION['user']['adresse']) && isset($_SESSION['user']['ville']) && ($_SESSION['user']['code_postal'])) {?>
        <label><span>Adresse </span><span
                    class="compte_infos"><?php
                $adresse = $_SESSION['user']['adresse'] . ", " . $_SESSION['user']['code_postal'] . " " . $_SESSION['user']['ville'];
                echo $adresse;
                } ?></span>
        </label>

        <?php if (isset($_SESSION['user']['telephone'])) {?>
        <label><span>Téléphone </span><span class="compte_infos"><?php
                echo $_SESSION['user']['telephone'];
                } ?></span>
        </label>



        <!--        </form>-->
    </div>
</div>

<div class="modal fade" id="myModalUpdateMail" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="mon_compte" action="sql/mon_compte.php" method="post">
                <div class="modal-header">
                    <h3 class="modal-title">Modifier son adresse email :
                        <?php if (isset($_SESSION['user'])) {
                        echo $_SESSION['user']['email'];
                        } ?></h3>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">
                    <label for="email"><span>Email </span><input type="email"
                                                                 class="input-field"
                                                                 name="email"
                                                                 required/>
                    </label>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Valider"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>

    </div>
</div>

