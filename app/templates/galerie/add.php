<?php $this->layout('layout', ['title' => 'Créer une galerie']) ?>

<?php $this->start('main_content') ?>
<h2>Crée une galerie</h2>
<?php
if (isset($error)) {
    debug($error);
}
//debug($_POST);
//debug($_FILES);
?>
<?php if (isset($vals)): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $vals['gal_name'] ?>"></br></br>

        <label for="legend">Legend</label></br>
        <input id="legend" type="text" name="legend" value="<?= $vals['gal_legend'] ?>"></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $vals['gal_description'] ?></textarea></br></br>

        <input type="submit" value="Créer la galerie"></br></br>
    </form>
<?php else: ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value=""></br></br>

        <label for="legend">Legend</label></br>
        <input id="legend" type="text" name="legend" value=""></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea></br></br>

        <input type="submit" value="Créer la galerie"></br></br>
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
