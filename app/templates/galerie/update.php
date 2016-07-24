<?php $this->layout('layout', ['title' => 'Modifier une galerie']) ?>

<?php $this->start('main_content') ?>
<?php
//debug($_POST);
//debug($_FILES); 
?>
<?php if (isset($galerieDetails)): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $galerieDetails['gal_name'] ?>"></br></br>

        <label for="legend">Legend</label></br>
        <input id="legend" type="text" name="legend" value="<?= $galerieDetails['gal_legend'] ?>"></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $galerieDetails['gal_description'] ?></textarea></br></br>

        <input type="submit" value="Modifier la galerie"></br></br>
    </form>
<?php elseif (isset($vals)): ?>
    <?php debug($error); ?>
    <?php debug($vals); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $vals['con_name'] ?>"></br></br>

        <label for="legend">Legend</label></br>
        <textarea name="legend" id="legend" cols="30" rows="10"><?= $vals['gal_legend'] ?></textarea></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $vals['gal_description'] ?></textarea></br></br>

        <input type="submit" value="Modifier la galerie"></br></br>
    </form>
<?php endif; ?>
<?php $this->stop('main_content') ?>