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
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
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
                            echo '<tr>
                                <td>', $user['name'], '</td>
                                <td>', $user['last_name'], '</td>
                                <td>', $user['username'],'</td>
                                <td>', $user['email'],'</td>
                                <td>', $user['date_registration']->format('d/m/Y à H\hi'),'</td>
                                <td>', $user['member_status'],'</td>
                                <td><a onclick="return confirm(\'Valider votre choix?\');" href="admin-users-delete-',$user['id'],'">Supprimer</a><br /><a href="admin-users-update-',$user['id'],'">Modifier</a></td>
                            </tr>', "\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>