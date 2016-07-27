<?php $this->layout('layout', ['title' => 'Modifier une galerie']) ?>

<?php $this->start('main_content') ?>
<h2>Modifier une galerie</h2>
<?php
//debug($_POST);
//debug($_FILES); 
?>
<div class="row">
    <div class="col-md-6 text-left">
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
                <textarea id="description" type="text" name="description" rows="10" value="<?= $galerieDetails['gal_description'] ?>" placeholder="Description" class="form-control text-left"></textarea>
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Modifier la galerie" href="#"><i class="fa fa-pencil fa-fw"></i> Modifier la galerie</button>
        </form>
    </div>
    <?php elseif (isset($vals)): ?>
    <?php debug($error); ?>
    <?php debug($vals); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
            <input id="titre" type="text" name="titre" value="<?= $vals['con_name'] ?>" required="" placeholder="Titre" class="form-control text-left">
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
        <button class="btn btn-primary btn-sm active" type="submit" value="Modifier la galerie" href="#"><i class="fa fa-pencil fa-fw"></i> Modifier la galerie</button>
    </form>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>