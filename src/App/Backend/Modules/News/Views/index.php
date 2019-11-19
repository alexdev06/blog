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

    <h3><a href="/admin-news-insert">Ajouter une news</a></h3>
    <h3 class="text-center">Liste des news</h3>

    <p style="text-align: center">Il y a actuellement <?= $newsCount ?> news :</p>


        <div class="row">
            <div class="col-lg-12 mx-auto my-4">
                <table id="usetTable" class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Auteur</th>
                            <th>Titre</th>
                            <th>Date d'ajout</th>
                            <th>Dernière modification</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listNews as $news)
                        {
                        echo '<tr>
                            <td>', $news['author'], '</td>
                            <td>', $news['title'], '</td>
                            <td>le ', $news['date_create']->format('d/m/Y à H\hi'), '</td>
                            <td>', ($news['date_create'] == $news['date_uptdate'] ? '-' : 'le '.$news['date_update']->format('d/m/Y à H\hi')), '</td>
                            <td><a href="admin-news-update-', $news['id'], '">Modifier</a><br /> <a onclick="return confirm(\'Valider votre choix?\');" href="admin-news-delete-', $news['id'], '">Supprimer</a><br /> <a href="news-', $news['id'], '">Consulter</a></td>
                        </tr>', "\n";
                        }
                        ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</section>
