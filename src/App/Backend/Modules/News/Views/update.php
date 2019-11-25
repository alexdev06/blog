<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>
    <div class="container" style="margin-bottom: 100px">
    <?php
    if ($visitor->hasFlash()) {
        ?>
        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <p class="flash"> <?= $visitor->getFlash(); ?> </p>
            </div>
        </div>
        <?php
    }
    ?>
    <?php require '_form.php';
    ?>
    </div>
</section>