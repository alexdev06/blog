<section class="content-page">
    <h1 class="text-center text-uppercase titre-pages"><?= $title ?></h1>
    <div class="divider-custom divider">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
    </div>

    <div class="container" style="margin-bottom: 100px">

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
                <p class="intro">Retrouvez les dernières news concernant les nouvelles technologies et le développement web.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
            <?php
            foreach ($listeNews as $news) {
                ?>

                <h3><a href="news-<?= $news['id'] ?>"><?= htmlspecialchars($news['title']) ?></a></h3>
                <p style="text-align: left;"><small><em>Modifiée le <?= $news['date_update']->format('d/m/Y à H\hi') ?></em></small></p>

                <p class="lead"><?= $news['lead'] ?></p>
                
                <p><?= nl2br(htmlspecialchars($news['content'])) ?> <a href="news-<?= $news['id'] ?>">lire la suite</a></p>
                <hr />
                <?php
            }
            ?>
        </div>
        </div>
    </div>
        <section class="news-pagination my-4" style="text-align: center; font-size: 1.3em">
            <?php
            if ($page > 1) {
                ?>
                <a href="news-page-<?php echo $page - 1; ?>">Page précédente</a>
                <?php
            }
            ?>

            <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $page) {
                        ?><a style="color: #2c3e50" href="news-page-<?php echo $i; ?>"><?php echo '[',$i,']'; ?></a>
                        <?php 
                    } else {
                        ?><a href="news-page-<?php echo $i ;?>" ><?php echo $i; ?></a> 
                        <?php
                    }?>
                    <?php
                }
            ?>

            <?php
            if ($page < $totalPages) {
                ?>
                <a href="news-page-<?php echo $page + 1; ?>">Page suivante</a>
                <?php
            }
        ?>
        
        </section>
    </div>
</section>