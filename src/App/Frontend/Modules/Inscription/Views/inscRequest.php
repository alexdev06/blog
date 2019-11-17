<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Prénom :</label><br />
                    <input type="text" id="name" name="name" class="form-control" /><br />
                </div>
                <div class="form-group">
                    <label for="last_name">Nom :</label><br />
                    <input type="text" id="last_name" name="last_name" class="form-control" /><br />
                </div>
                <div class="form-group">
                    <label for="username">Pseudo :</label><br />
                    <input type="text" id="username" name="username" class="form-control" /><br />
                </div>
                <div class="form-group">
                    <label for="email">Email :</label><br />
                    <input type="email" id="email" name="email"  class="form-control"/><br />
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label><br />
                    <input type="password" id="password" name="password" class="form-control" /><br />
                </div>
                <input class="btn btn-success btn-lg" type="submit" value="Envoyer" />
                <input class="btn btn-success btn-lg" type="reset" value="Réinitialiser">
            </form> 

            </div>
        </div>
    </div>
</section>