<?php $this->layout('layout', ['title' => 'Modifier un event']) ?>

<?php $this->start('main_content') ?>
<?php 

//debug($_POST);

//debug($_FILES); ?>
<?php if (isset($eventsDetails)):?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $eventsDetails['con_title'] ?>"></br></br>

        <label for="dateStart">Date de début</label></br>

        <input id="dateStart" type="date" name="dateStart" value="<?= $eventsDetails['con_date_start'] ?>"></br></br>

        <label for="dateEnd">Date de fin</label></br>
        <input id="dateEnd" type="date" name="dateEnd" value="<?= $eventsDetails['con_date_end'] ?>"></br></br>


        <label for="synopsis">Synopsis</label></br>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10"><?= $eventsDetails['con_synopsis'] ?></textarea></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $eventsDetails['con_description'] ?></textarea></br></br>

        <label for="avatar">Photo</label></br>
        <input id="avatar" type="file" name="avatar"></br></br>

        <input type="submit" value="Modifier l'event"></br></br>
    </form>
    <?php elseif(isset($vals)): ?>
    <?php debug($error); ?>
    <?php debug($vals); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label></br>
        <input id="titre" type="text" name="titre" value="<?= $vals['con_title'] ?>"></br></br>

        <label for="dateStart">Date de début</label></br>
        <input id="dateStart" type="date" name="dateStart" value="<?= $vals['con_date_start'] ?>"></br></br>

        <label for="dateEnd">Date de fin</label></br>
        <input id="dateEnd" type="date" name="dateEnd" value="<?= $vals['con_date_end'] ?>"></br></br>

        <label for="synopsis">Synopsis</label></br>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10"><?= $vals['con_synopsis'] ?></textarea></br></br>

        <label for="description">Description</label></br>
        <textarea name="description" id="description" cols="30" rows="10"><?= $vals['con_description'] ?></textarea></br></br>

        <label for="avatar">Photo</label></br>
        <input id="avatar" type="file" name="avatar"></br></br>

        <input type="submit" value="Modifier l'event"></br></br>
    </form>
    <?php endif;?>
<?php $this->stop('main_content') ?>