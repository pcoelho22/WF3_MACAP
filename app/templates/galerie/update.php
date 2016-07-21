<?php $this->layout('layout', ['title' => 'Modifier une galerie']) ?>

<?php $this->start('main_content') ?>
<?php 

//debug($_POST);

//debug($_FILES); ?>
<?php if (isset($eventsDetails)):?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $eventsDetails['gal_title'] ?>"></br></br>

        <label for="legend">Legend</label></br>
         <input id="legend" type="text" name="legend" value="<?= $eventsDetails['gal_legend'] ?>"></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $eventsDetails['gal_description'] ?></textarea></br></br>

        <input type="submit" value="Modifier la galerie"></br></br>
    </form>
    <?php elseif(isset($vals)): ?>
    <?php debug($error); ?>
    <?php debug($vals); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $vals['con_title'] ?>"></br></br>

        <label for="synopsis">Legend</label></br>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10"><?= $vals['con_synopsis'] ?></textarea></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $vals['con_description'] ?></textarea></br></br>

        <input type="submit" value="Modifier la galerie"></br></br>
    </form>
    <?php endif;?>
<?php $this->stop('main_content') ?>