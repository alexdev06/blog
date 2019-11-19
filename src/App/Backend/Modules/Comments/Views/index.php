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
        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <table id="usetTable" class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Auteur</th>
                            <th>News</th>
                            <th>Contenu</th>
                            <th>Date d'ajout</th>
                            <th>Status</th>
                            <th>Action</th>
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
                                <td>', $comment['author'], '</td>
                                <td><a href="/admin-news-', $comment['news_id'], '">', $comment['news_id'],'</a></td>
                                <td>', nl2br(htmlspecialchars($comment['content'])), '</td>
                                <td>le ', $comment['date_create']->format('d/m/Y à H\hi'), '</td>
                                <td>' . $comment['published'] . '</td>
                                <td><a href="admin-comments-update-', $comment['id'], '">Modifier</a><br /> <a onclick="return confirm(\'Valider votre choix?\');" href="admin-comments-delete-', $comment['id'], '">Supprimer</a><br /> <a href="admin-news-', $comment['news_id'], '">News</a></td>
                            </tr>', "\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>