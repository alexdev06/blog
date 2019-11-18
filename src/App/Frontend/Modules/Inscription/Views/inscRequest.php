<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>
    
    <div class="container" style="margin-bottom: 100px">
    <?php
    if ($visitor->hasFlash()) {
        ?>
        <p class="flash"> <?= $visitor->getFlash(); ?> </p>
        <?php
    }
    ?>
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <form action="" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Prénom</label>
                            <input type="text" name="name" class="form-control" placeholder="Prénom" id="name" required data-validation-required-message="Entrez votre prénom.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Nom</label>
                            <input type="text" name="lastName" class="form-control" placeholder="Nom" id="lastName" required data-validation-required-message="Entrez votre nom.">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Adresse email</label>
                            <input type="email" name="email" class="form-control" placeholder="Adresse email" id="email" required data-validation-required-message="Entrez votre adresse email.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" placeholder="Login" id="login" required data-validation-required-message="Entrez votre login.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" id="password" required data-validation-required-message="Entrez votre mot de passe.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Confirmez le mot de passe</label>
                            <input type="password" name="passCheck" class="form-control" placeholder="Confirmer le mot de passe" id="passCheck" required data-validation-required-message="Confirmez votre mot de passe.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <br />
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-6">
                            <button type="submit" class="btn btn-primary btn-lg" id="sendMessageButton" onclick="return confirm('Valider votre choix?');">Envoyer</button>
                        </div>
                        <div class="form-group col-6">
                            <button type="reset" class="btn btn-primary btn-lg" id="sendMessageButton">Réinitialiser</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</section>