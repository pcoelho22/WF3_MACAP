<?php $this->layout('layout', ['title' => 'Modifier un event']) ?>

<?php $this->start('main_content') ?>
<h2>Mise à jour des events</h2>
<?php
//debug($_POST);
//debug($_FILES); 
?>
<div class="row">
    <div class="col-md-6 text-left">
    <?php if (isset($eventsDetails)): ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="titre" type="text" name="titre" value="<?= $eventsDetails['con_title'] ?>" required="" placeholder="Titre" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                <input id="dateStart" type="date" name="dateStart" value="<?= $eventsDetails['con_date_start'] ?>" required="" placeholder="Date de début jj/mm/aaaa" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                <input id="dateEnd" type="date" name="dateEnd" value="<?= $eventsDetails['con_date_end'] ?>" required="" placeholder="Date de fin jj/mm/aaaa" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="synopsis" type="text" name="synopsis" rows="10" value="<?= $eventsDetails['con_synopsis'] ?>" placeholder="Synopsis" class="form-control text-left"></textarea>
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" type="text" name="description" rows="10" value="<?= $eventsDetails['con_description'] ?>" placeholder="Description" class="form-control text-left"></textarea>
            </div>
            <span class="help-block"></span>
            <h5><strong>Veuillez sélectionner une photo à ajouter(optionnel).</strong></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                <input id="avatar" type="file" name="avatar" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Modifier la galerie" href="#"><i class="fa fa-pencil fa-fw"></i> Modifier un Event</button>
        </form>
    </div>
    <?php elseif (isset($vals)): ?>
    <?php debug($error); ?>
    <?php debug($vals); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
            <input id="titre" type="text" name="titre" value="<?= $vals['con_title'] ?>" required="" placeholder="Titre" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
            <input id="dateStart" type="date" name="dateStart" value="<?= $vals['con_date_start'] ?>" required="" placeholder="Date de début jj/mm/aaaa" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
            <input id="dateEnd" type="date" name="dateEnd" value="<?= $vals['con_date_end'] ?>" required="" placeholder="Date de fin jj/mm/aaaa" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
            <textarea id="synopsis" type="text" name="synopsis" rows="10" value="<?= $vals['con_synopsis'] ?>" placeholder="Synopsis" class="form-control text-left"></textarea>
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
            <textarea id="description" type="text" name="description" rows="10" value="<?= $vals['con_description'] ?>" placeholder="Description" class="form-control text-left"></textarea>
        </div>
        <span class="help-block"></span>
        <h5><strong>Veuillez sélectionner une photo à ajouter(optionnel).</strong></h5>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
            <input id="avatar" type="file" name="avatar" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <button class="btn btn-primary btn-sm active" type="submit" value="Modifier la galerie" href="#"><i class="fa fa-pencil fa-fw"></i> Modifier un Event</button>
    </form>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>