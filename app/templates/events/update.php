<?php $this->layout('layout', ['title' => 'Modifier un Event']) ?>

<?php $this->start('main_content') ?>
<h2>Modifier un Event</h2>

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
                <textarea id="synopsis" name="synopsis" rows="10" placeholder="Synopsis" class="form-control text-left"><?= $eventsDetails['con_synopsis'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" name="description" rows="10" placeholder="Description" class="form-control text-left"><?= $eventsDetails['con_description'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <h5><strong>Veuillez sélectionner une photo à ajouter(optionnel).</strong></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                <input id="avatar" type="file" name="avatar" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier l'Event</button>
        </form>
    </div>
    <?php elseif (isset($vals)): ?>

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
        <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier l'Event</button>
    </form>

    <?php if (isset($error)): ?>
    <div class="col-md-5 text-left">
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
    
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>