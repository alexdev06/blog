<section class="content-page" style="margin-top: 150px">
    <h1 class="text-center"><?= $title ?></h1>
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
            <div class="col-lg-12 mx-auto my-4">
                <p class="flash"> <?= $visitor->getFlash(); ?> </p>
            </div>
        </div>
        <?php
    }
    ?>

    <div style="height: 200px" class="container d-flex align-items-center justify-content-center flex-column">
    
                <h2 class="text-center text-uppercase news-add">
                    <a class="news-add" href="/admin-news-insert">Ajouter une news</a>
                </h2>

    </div>

    

    <p>Il y a actuellement <?= $newsCount ?> news :</p>


        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <table id="usetTable" class="table table-striped dt_responsive">
                    <thead class="thead">
                        <tr>
                            <th>Auteur</th>
                            <th>Titre</th>
                            <th>Chapô</th>
                            <th>Date ajout</th>
                            <th>Dernière modification </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listNews as $news)
                        {
                        echo '<tr">
                            <td>', $news['author'], '</td>
                            <td>', $news['title'], '</td>
                            <td>', $news['lead'], '</td>
                            <td>', $news['date_create']->format('d/m/Y à H\hi'), '</td>
                            <td>', ($news['date_create'] == $news['date_uptdate'] ? '-' : $news['date_update']->format('d/m/Y à H\hi')), '</td>
                            <td><a href="admin-news-update-', $news['id'], '">Modifier</a><br /> <a onclick="return confirm(\'Valider la suppression ?\');" href="admin-news-delete-', $news['id'], '">Supprimer</a><br /> <a href="admin-news-', $news['id'], '">Afficher</a></td>
                        </tr>', "\n";
                        }
                        ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</section>
