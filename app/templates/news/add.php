<?php $this->layout('layout', ['title' => 'Crée une news']) ?>

<?php $this->start('main_content') ?>
<h2>Ajouter une news</h2>
<?php
if (isset($error)) {
    debug($error);
}
//debug($_POST);
//debug($_FILES);
?>
<div class="row">
    <div class="col-md-6 text-left">
    <?php if (isset($vals)): ?>
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
            <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter une news" href="#"><i class="fa fa-pencil fa-fw"></i> Ajouter une news</button>
        </form>
    </div>
    <?php else: ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
            <input id="titre" type="text" name="titre" value="" required="" placeholder="Titre" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
            <input id="dateStart" type="date" name="dateStart" value="" required="" placeholder="Date de début jj/mm/aaaa" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
            <input id="dateEnd" type="date" name="dateEnd" value="" required="" placeholder="Date de fin jj/mm/aaaa" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
            <textarea id="synopsis" type="text" name="synopsis" rows="10" value="" placeholder="Synopsis" class="form-control text-left"></textarea>
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
            <textarea id="description" type="text" name="description" rows="10" value="" placeholder="Description" class="form-control text-left"></textarea>
        </div>
        <span class="help-block"></span>
        <h5><strong>Veuillez sélectionner une photo à ajouter(optionnel).</strong></h5>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
            <input id="avatar" type="file" name="avatar" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter une news" href="#"><i class="fa fa-pencil fa-fw"></i> Ajouter une news</button>
    </form>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
