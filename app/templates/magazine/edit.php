<?php $this->layout('layout', ['title' => 'Magazine']) ?>
<?php $this->start('main_content') ?>

    <h2>Modifier un Magazine</h2>
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
            <form action="" method="post" role="form" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                    <input id="mag_name" type="text" name="mag_name" value="<?= $vals['mag_name'] ?>" placeholder="Nom du magazine" class="form-control text-left">
                </div>
                <h5><strong>Veuillez sélectionner le magazine pdf a modifier (optionnelle)</strong></h5>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                    <input id="magazinePdf" type="file" name="mazinePdf" class="form-control text-left">
                </div>
                <h5><strong>Veuillez sélectionner la couverture du magazine a modifier (optionnelle)</strong></h5>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                    <input id="magazineCouv" type="file" name="magazineCouv" class="form-control text-left">
                </div>
                <span class="help-block"></span>
            <a class="btn btn-default btn-sm" href="<?= $this->url('magazine_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier le Magazine</button>
            <br>
            <h4>Une fois la modification validée, vous serez redirigé vers la liste des magazines.</h4>
        </form>
    </div>

        <?php elseif (isset($values)): ?>
            <form action="" method="post" role="form" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                    <input id="mag_name" type="text" value="<?= $values['mag_name'] ?>" name="mag_name" placeholder="Nom du magazine" class="form-control text-left">
                </div>
                <h5><strong>Veuillez sélectionner le magazine pdf a ajouter :</strong></h5>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                    <input id="magazinePdf" type="file" name="magazinePdf" class="form-control text-left">
                </div>
                <h5><strong>Veuillez sélectionner la couverture du magazine a ajouter :</strong></h5>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                    <input id="magazineCouv" type="file" name="magazineCouv" class="form-control text-left">
                </div>
                <span class="help-block"></span>
            <a class="btn btn-default btn-sm" href="<?= $this->url('magazine_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-pencil fa-fw"></i> Modifier le Magazine</button>
            <br>
            <h4>Une fois la modification validée, vous serez redirigé vers la liste des magazines.</h4>
        </form>
    </div>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>