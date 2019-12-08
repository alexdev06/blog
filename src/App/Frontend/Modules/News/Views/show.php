<section class="content-page news-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <h1 class="text-center"><?= $title ?></h1>
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
            <div class="col-lg-10 mx-auto my-4">
                <p class="intro-news">Par <em><?= $news['author'] ?></em>, le <?= $news['dateUpdate']->format('d/m/Y à H\hi') ?></p>

                <p class="lead justify"><?= htmlspecialchars($news['lead']) ?></p>

                <p class="justify"><?= nl2br(htmlspecialchars($news['content'])) ?></p>

                <?php if ($news['dateCreate'] != $news['dateUpdate']) { ?>
                <p style="text-align: right;">
                    <small>
                        <em>Modifiée le <?= $news['dateUpdate']->format('d/m/Y à H\hi') ?></em>
                    </small>
                </p>
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
                    <legend class="legend-comm">
                    Posté par <strong><?= htmlspecialchars($comment['author']) ?> </strong> le <?= $comment['dateCreate']->format('d/m/Y à H\hi') ?> :
                    </legend>
                    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                    <hr />
                </fieldset>
                <?php
                }
                ?>
            </div>
        </div>
    </div> 
</section>