<section class="content-page" style="margin-top: 150px">
    <h1 class="text-center titre-pages"><?= $title ?></h1>
    <div class="divider-custom divider-dark">
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
            <div class="col-lg-6 mx-auto my-4">
                <p class="flash"> <?= $visitor->getFlash(); ?> </p>
            </div>
        </div>
        <?php
    }
    ?>
        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <table id="usetTable" class="table table-striped dt_responsive" style="width: 100%">
                    <thead class="thead">
                        <tr>
                            <th data-priority="2">Auteur</th>
                            <th>News</th>
                            <th data-priority="1">Contenu</th>
                            <th class="sort-date">Date d'ajout</th>
                            <th data-priority="1">Status</th>
                            <th data-priority="1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($comments as $comment)
                        {
                            if ($comment['published'] == 1) {
                                $comment['published'] = 'publié';
                            } else {
                                $comment['published'] = 'masqué';
                            }
                            echo '<tr>
                                <td>', htmlspecialchars($comment['author']), '</td>
                                <td><a href="/admin-news-', $comment['newsId'], '">', $comment['newsId'],'</a></td>
                                <td>', nl2br(htmlspecialchars($comment['content'])), '</td>
                                <td>', $comment['dateCreate']->format('d/m/Y H\hi'), '</td>
                                <td>' . $comment['published'] . '</td>
                                <td><a href="admin-comments-update-', $comment['id'], '">Modifier</a><br /> <a onclick="return confirm(\'Confirmer la suppression ?\');" href="admin-comments-delete-', $comment['id'], '">Supprimer</a><br /> <a href="admin-news-', $comment['newsId'], '">News</a></td>
                            </tr>', "\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>