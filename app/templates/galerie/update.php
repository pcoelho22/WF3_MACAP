<?php $this->layout('layout', ['title' => 'Modifier une galerie']) ?>

<?php $this->start('main_content') ?>
<h2>Modifier une galerie</h2>
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
    <?php if (isset($galerieDetails)): ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="titre" type="text" name="titre" value="<?= $galerieDetails['gal_name'] ?>" required="" placeholder="Titre" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="legend" type="text" name="legend" value="<?= $galerieDetails['gal_legend'] ?>" required="" placeholder="Legend" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" name="description" rows="10" placeholder="Description" class="form-control text-left"><?= $galerieDetails['gal_description'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <a class="btn btn-default btn-sm" href="<?= $this->url('galerie_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier la galerie</button>
        </form>
    </div>

    <?php elseif (isset($vals)): ?>
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
                <textarea id="description" name="description" rows="10" placeholder="Description" class="form-control text-left"><?= $vals['gal_description'] ?></textarea>
            </div>
            <span class="help-block"></span>
            <a class="btn btn-default btn-sm" href="<?= $this->url('galerie_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier la galerie</button>
        </form>
    </div>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>