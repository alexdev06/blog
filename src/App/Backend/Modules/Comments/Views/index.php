<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr><th>Auteur</th><th>Contenu</th><th>Date d'ajout</th><th>Action</th></tr>
        </thead>

        <?php
        foreach ($comments as $comment)
        {
        echo '<tr><td>', $comment['author'], '</td><td>', $comment['content'], '</td><td>le ', $comment['date_create']->format('d/m/Y à H\hi'), '</td><td><a href="admin-comments-validate-', $comment['id'] , '">Valider</a><br /> <a href="admin-comments-delete-', $comment['id'] , '">Supprimer</a></td></tr>', "\n";
        }
        ?>
    </table>
</section>