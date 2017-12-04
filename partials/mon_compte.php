<div class="contenu">
    <div class="form-etiquette">
        <div class="cercle"></div>
        <div class="ficelle"></div>

        <form id="mon_compte" action="sql/mon_compte.php" method="post">


            <label for="email"><span>Email <span class="required">*</span></span><input type="email" class="input-field"
                                                                                        name="email"
                                                                                        value="<?php if (isset($_SESSION['user'])) {
                                                                                            echo $_SESSION['user']['email'];
                                                                                        } ?>"
                                                                                        required/>
                <button class="btn btn-update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </label>

            <label for="telephone"><span>Téléphone <span class="required">*</span></span><input type="text"
                                                                                                class="input-field"
                                                                                                name="telephone"
                                                                                                value=" <?php if (isset($_SESSION['user'])) {
                                                                                                    echo $_SESSION['user']['telephone'];
                                                                                                } ?>"
                                                                                                required/>
                <button class="btn btn-update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </label>

            <input type="submit" value="Valider"/>


        </form>
    </div>
</div>

