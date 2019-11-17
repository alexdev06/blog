<section class="content-page" style="margin-top: 150px">
    <h2 class="text-center"><?= $title ?></h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto my-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo :</label><br />
                        <input class="form-control" type="text" name="pseudo" id="pseudo" /><br />
                    </div>    
                    <div class="form-group">
                        <label for="message">Commentaire :</label><br />
                        <textarea class="form-control" name="message" id="message" rows="7" cols="50"></textarea><br />
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-lg" type="submit" value="Commenter" />
                        <input  class="btn btn-success btn-lg" type="reset" value="Réinitialiser" />
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>