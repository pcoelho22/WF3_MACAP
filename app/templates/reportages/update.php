<?php $this->layout('layout', ['title' => 'Modifier un Reportage']) ?>

<?php $this->start('main_content') ?>
<h2>Modifier un Reportage</h2>
<div class="row">
    <?php if (isset($error)): ?>
    <div class="col-md-7 text-left">
        <div class="alert alert-danger fade in" rows="auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Erreur!</strong><br>
            <ul>
                <?php foreach ($error as $value): ?>
                    <li><?= $value ?></li>
                <?php endforeach; ?>    
            </ul>
        </div>
    </div> 
    <?php endif; ?>    
</div>
<div class="row">
    <div class="col-md-7 text-left">
        <?php if (isset($reportagesDetails)): ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="titre" type="text" name="titre" value="<?= $reportagesDetails['con_title'] ?>" required="" placeholder="Titre" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                <input id="dateStart" type="date" name="dateStart" value="<?= $reportagesDetails['con_date_start'] ?>" required="" placeholder="Date de début" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                <input id="dateEnd" type="date" name="dateEnd" value="<?= $reportagesDetails['con_date_end'] ?>" required="" placeholder="Date de fin" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="synopsis" name="synopsis" rows="10" placeholder="Synopsis" class="form-control text-left"><?= $reportagesDetails['con_synopsis'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" name="description" rows="10" placeholder="Description" class="form-control text-left"><?= $reportagesDetails['con_description'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <h5><strong>Veuillez sélectionner une photo à ajouter(optionnel).</strong></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                <input id="avatar" type="file" name="avatar" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier le Reportage</button>
        </form>
    </div>

        <?php elseif (isset($vals)): ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="titre" type="text" name="titre" value="<?= $vals['con_title'] ?>"  placeholder="Titre" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                <input id="dateStart" type="date" name="dateStart" value="<?= $vals['con_date_start'] ?>" required="" placeholder="Date de début" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                <input id="dateEnd" type="date" name="dateEnd" value="<?= $vals['con_date_end'] ?>" required="" placeholder="Date de fin" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="synopsis" name="synopsis" rows="10" placeholder="Synopsis" class="form-control text-left"><?= $vals['con_synopsis'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" name="description" rows="10" placeholder="Description" class="form-control text-left"><?= $vals['con_description'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <h5><strong>Veuillez sélectionner une photo à ajouter(optionnel).</strong></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                <input id="avatar" type="file" name="avatar" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil-square-o fa-fw"></i> Modifier le Reportage</button>
        </form>
    </div>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>