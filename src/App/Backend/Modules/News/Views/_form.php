<form action="" method="post">
    <p>
    <div class="form-group">
        <label for="author">Auteur :</label><br />
        <input type="text" class="form-control"  id="author" name="author" value="<?= isset($news) ? $news['author'] : '' ?>" /><br />
    </div>
    <div class="form-group">
        <label for="title">Titre :</label><br />
        <input type="text" class="form-control"  id="title" name="title" value="<?= isset($news) ? $news['title'] : '' ?>" /><br />
    </div>
    <div class="form-group">
        <label for="content">Contenu :</label><br />
        <textarea name="content" class="form-control"  id="content" cols="60" rows="10"><?= isset($news) ? $news['content'] : '' ?></textarea><br />
    </div>

        <?php
        if (isset($news) && !$news->isNew()) {
            ?>
            <input type="hidden" name="id" value="<?= $news['id'] ?>" />
            <input type="submit" class="btn btn-primary" value="Modifier" name="modifier" onclick="return confirm('Valider votre choix?');" />
            <?php
        } else {
            ?>
            <input type="submit" class="btn btn-success btn-lg" value="Ajouter" onclick="return confirm('Valider votre choix?');"/>
            <input type="reset" class="btn btn-success btn-lg" value="Réinitialiser" />
            <?php
        }
        ?>
    </p>
</form>