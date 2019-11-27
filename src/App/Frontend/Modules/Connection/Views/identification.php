<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>

    <div class="container">

    <?php
    if ($visitor->hasFlash()) {
        ?>
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <p class="flash text-center"> <?= $visitor->getFlash(); ?> </p>
            </div>
        </div>
        <?php
    }
    ?>
        <div class="row mt-4">
            <div class="col-lg-10 mx-auto">  
                <p class="lead text-center">Seuls les utilisateurs ayant été validés en tant que membre ont accès à l'espace d'administration.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <form action="" method="post">
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
                    <br />
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-6">
                            <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>