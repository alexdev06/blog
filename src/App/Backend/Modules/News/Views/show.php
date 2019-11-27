<section class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <h1 class="text-center"><?= $title ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <p>Par <em><?= htmlspecialchars($news['author']) ?></em>, le <?= $news['date_create']->format('d/m/Y à H\hi') ?></p>

                <p class="lead justify"><?= htmlspecialchars($news['lead']) ?></p>

                <p class="justify"><?= nl2br(htmlspecialchars($news['content'])) ?></p>

                <?php if ($news['date_create'] != $news['date_update']) { ?>
                <p style="text-align: right;"><small><em>Modifiée le <?= $news['date_update']->format('d/m/Y à H\hi') ?></em></small></p>
                <?php } ?>
            </div>
        </div>
        
        <h2 class="text-center my-5">Liste des commentaires</h2>

        <table id="usetTable" class="table table-striped dt_responsive">
            <thead class="thead">
                <tr><th>Auteur</th><th>News</th><th>Contenu</th><th>Date d'ajout</th><th>Status</th><th>Action</th></tr>
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
                            <td><a href="/admin-news-', $comment['news_id'], '">', $comment['news_id'],'</a></td>
                            <td>', nl2br(htmlspecialchars($comment['content'])), '</td>
                            <td>le ', $comment['date_create']->format('d/m/Y à H\hi'), '</td>
                            <td>' . $comment['published'] . '</td>
                            <td><a href="admin-comments-update-', $comment['id'], '-' ,$comment['news_id'], '">Modifier</a><br /> <a onclick="return confirm(\'Valider votre choix?\');" href="admin-comments-delete-', $comment['id'], '-',$comment['news_id'], '">Supprimer</a></td>
                    </tr>', "\n";
                }
                ?>
            </tbody>
        </table>
    </div> 
</section>