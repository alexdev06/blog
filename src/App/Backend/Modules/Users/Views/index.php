<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>
    <?php
    if (isset($listUsers)) {
    ?>
    <table class="table table-striped mt5">
        <thead class="thead-dark">
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
                <th>Statut de membre</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listUsers as $user)
            {
                if ($user['member_status'] == 1) {
                    $user['member_status'] = 'validé';
                } else {
                    $user['member_status'] = 'en attente';
                }
                echo '<tr><td>', $user['name'], '</td><td>', $user['last_name'], '</td><td>', $user['username'],'</td><td>', $user['email'],'</td><td>', $user['member_status'],'</td><td><a href="admin-users-delete-',$user['id'],'">Supprimer</a><br /><a href="admin-users-update-',$user['id'],'">Modifier</a></td</tr>', "\n";
            }
            ?>
        </tbody>
    </table>
        <?php
        }
        ?>
</section>