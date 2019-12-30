<section class="content-page news-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <h1 class="text-center news-title"><?= $title ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
    <?php
    if ($visitor->hasFlash()) {
        ?>
        <div class="row">
            <div class="col-lg-6 mx-auto my-4">
                <p class="flash text-center"> <?= $visitor->getFlash(); ?> </p>
            </div>
        </div>
        <?php
    }
    ?>

        <div class="row">
            <div class="col-lg-10 mx-auto my-4 ">
                <div class="row justify-content-between">
                    <div class="col-9 intro-news">Par <em><?= $news['author'] ?></em>, le <?= $news['dateUpdate']->format('d/m/Y à H\hi') ?></div>
                    <?php
                    if (!empty($news['userUsername'])) {
                        ?>
                        <div class="col-3 text-right">
                            posté par <em><?= htmlspecialchars($news['userUsername']) ?></em>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <hr />

                <p class="lead justify"><?= htmlspecialchars($news['lead']) ?></p>

                <p class="news-content justify"><?= nl2br(htmlspecialchars($news['content'])) ?></p>

                <?php if ($news['dateCreate'] != $news['dateUpdate']) { ?>
                <p style="text-align: right;">
                    <small>
                        <em>Modifié le <?= $news['dateUpdate']->format('d/m/Y à H\hi') ?></em>
                    </small>
                </p>
                <?php } ?>
                <br />
                <hr class="news-comm-separator">
                <?php
                if (!empty($comments)) {?>
                    <p class="text-center"><a href="#comment_form" class="add-comment-link js-scroll-trigger nav-link py-3 px-0 px-lg-3 rounded">Ajouter un commentaire</a></p>
                <?php 
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
            
                <?php
                if (empty($comments)) {
                echo '<p class="no-comment">Aucun commentaire n\'a encore été posté!</p>';
                } else {
                    echo '<p class="no-comment"><em>Commentaires :</em></p>';
                }
                foreach ($comments as $comment) {
                ?>
                <hr class="comm-separator" />
                <div>
                    <p class="legend-comm">
                        Posté par <strong><?= htmlspecialchars($comment['author']) ?> </strong> le <?= $comment['dateCreate']->format('d/m/Y à H\hi') ?> :
                        </p>
                    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-10 mx-auto my-4">
                <form id="comment_form"  action="" method="post">
                    <legend> Commentez cet article :</legend>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" id="pseudo" required data-validation-required-message="Entrez votre pseudo.">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Commentaire*</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Commentaire*" id="message" required data-validation-required-message="Entrez votre commentaire."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LehGMAUAAAAAAu-G1BzjkHTyWssiMYxtuL--4bm"></div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-6">
                            <button type="submit" id="sendMessageButton" class="btn btn-primary btn-lg" onclick="return confirm('Confirmer l\'envoi du commentaire ?');" >Envoyer</button>
                        </div>
                        <div class="form-group col-6">
                            <button type="reset" id="sendMessageButton" class="btn btn-primary btn-lg">Réinitialiser</button>
                        </div>
                    </div>
                </form>
                <br />
                <p>*Les commentaires ne sont publiés qu'après validation par l'équipe de modération.</p>
            </div>
        </div>
                
            </div>
        </div>
    </div> 
</section>