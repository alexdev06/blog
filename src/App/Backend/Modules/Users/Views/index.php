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
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th data-priority="2">Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th data-priority="2">Statut de membre</th>
                            <th data-priority="1">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($listUsers as $user)
                        {
                            if ($user['memberStatus'] == 1) {
                                $user['memberStatus'] = 'validé';
                            } else {
                                $user['memberStatus'] = 'en attente';
                            }
                            echo '<tr>
                                <td>', htmlspecialchars($user['name']), '</td>
                                <td>', htmlspecialchars($user['lastName']), '</td>
                                <td>', htmlspecialchars($user['username']),'</td>
                                <td>', htmlspecialchars($user['email']),'</td>
                                <td>', $user['dateRegistration']->format('d/m/Y H\hi'),'</td>
                                <td>', $user['memberStatus'],'</td>
                                <td><a onclick="return confirm(\'Valider la suppression ?\');" href="admin-users-delete-',$user['id'],'">Supprimer</a><br /><a href="admin-users-update-',$user['id'],'">Modifier</a></td>
                            </tr>', "\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>