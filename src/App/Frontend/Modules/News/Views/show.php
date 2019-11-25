<section class="content-page" style="margin-top: 150px">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <h2 class="text-center"><?= $title ?></h2>
            </div>
        </div>
    </div>

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

        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <p>Par <em><?= $news['author'] ?></em>, le <?= $news['date_create']->format('d/m/Y à H\hi') ?></p>
                <p><?= nl2br($news['content']) ?></p>

                <?php if ($news['date_create'] != $news['date_update']) { ?>
                <p style="text-align: right;"><small><em>Modifiée le <?= $news['date_update']->format('d/m/Y à H\hi') ?></em></small></p>
                <?php } ?>

                <p><a href="comment-news-<?= $news['id'] ?>">Ajouter un commentaire</a></p>

                <?php
                if (empty($comments)) {
                ?>
                <p>Aucun commentaire n'a encore été posté!</p>
                <?php
                }
                foreach ($comments as $comment) {
                ?>
                <fieldset>
                    <legend>
                    Posté par <strong><?= htmlspecialchars($comment['author']) ?> </strong> le <?= $comment['date_create']->format('d/m/Y à H\hi') ?>
                    </legend>
                    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                </fieldset>
                <?php
                }
                ?>

                <p><a href="comment-news-<?= $news['id'] ?>">Ajouter un commentaire</a></p>
            </div>
        </div>
    </div> 
</section>