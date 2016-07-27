<?php $this->layout('layout', ['title' => 'Créer une galerie']) ?>

<?php $this->start('main_content') ?>
<h2>Ajouter une galerie</h2>
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
    <?php if (isset($vals)): ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="titre" type="text" name="titre" value="<?= $vals['gal_name'] ?>" required="" placeholder="Titre" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="legend" type="text" name="legend" value="<?= $vals['gal_legend'] ?>" required="" placeholder="Legend" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" type="text" name="description" rows="10" value="<?= $vals['gal_description'] ?>" placeholder="Description" class="form-control text-left"></textarea>
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil-square-o fa-fw"></i> Ajouter la galerie</button>
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
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="legend" type="text" name="legend" value="" required="" placeholder="Legend" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" type="text" name="description" rows="10" value="" placeholder="Description" class="form-control text-left"></textarea>
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil-square-o fa-fw"></i> Ajouter la galerie</button>
        </form>
    </div>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
