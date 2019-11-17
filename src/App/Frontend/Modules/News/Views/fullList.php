<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>
    <?php
    foreach ($listNews as $news) {
        ?>

        <h3><a href="news-<?= $news['id'] ?>"><?= $news['title'] ?></a></h3>
        <p style="text-align: left;"><small><em>Modifiée le <?= $news['date_update']->format('d/m/Y à H\hi') ?></em></small></p>

        <p><?= nl2br($news['content']) ?> <a href="news-<?= $news['id'] ?>">lire la suite</a></p>

        <?php
    }
    ?>
</section>