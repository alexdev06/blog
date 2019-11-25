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
                <p class="lead">Vous souhaitez contribuer activement à la vie du blog? Poster des news et valider les commentaires?  Pour celà, remplissez le formulaire d'inscription et votre candidature sera étudiée avec le plus grand soin.</p>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-10 mx-auto my-4">
                <form action="" method="post">
                    <div class="ontrol-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" id="pseudo" required data-validation-required-message="Entrez votre pseudo.">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Commentaire</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Entrez votre commentaire."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-6">
                            <button type="submit" id="sendMessageButton" class="btn btn-primary btn-lg" onclick="return confirm('Valider votre choix?');" >Envoyer</button>
                        </div>
                        <div class="form-group col-6">
                            <button type="reset" id="sendMessageButton" class="btn btn-primary btn-lg">Réinitialiser</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>