<?php $this->layout('layout', ['title' => 'Modifier les informations de votre compte']) ?>

<?php $this->start('main_content') ?>
<h2>Modifier les informations de votre compte</h2>
<div class="row">

    <div class="col-md-7 text-left">
        <?php if (isset($vals)): ?>
        <form action="" method="post" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="name" type="text" name="lastName" value="<?= $vals['use_name'] ?>" required="" placeholder="Nom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstName" type="text" name="firstName" value="<?= $vals['use_first_name'] ?>" placeholder="Prénom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="adress" type="text" name="adress" value="<?= $vals['use_address'] ?>" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="<?= $vals['use_post_code'] ?>" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="<?= $vals['use_city'] ?>" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="<?= $vals['use_phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays) + votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="<?= $vals['use_fax'] ?>" placeholder="N° de fax (Optionel - Format: (00 + Code Pays) + votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="passwordVerif" type="password" name="passwordVerif" value="<?= $vals['use_password'] ?>" placeholder="Enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="passwordVerif" type="password" name="passwordVerif" value="" placeholder="Re-enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Valider les modifications" href="#"><i class="fa fa-pencil fa-fw"></i> Valider les modifications</button>
            <span class="help-block"></span>
            <h4>Une fois les données modifiées, vous serez redirigé vers la page d'accueil.</h4>
        </form>
    </div>

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

    <?php elseif (isset($values)): ?>

        <form action="#" method="post" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="name" type="text" name="lastName" value="<?= $values['use_name'] ?>" required="" placeholder="Nom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstName" type="text" name="firstName" value="<?= $values['use_first_name'] ?>" placeholder="Prénom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="adress" type="text" name="adress" value="<?= $values['use_address'] ?>" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="<?= $values['use_post_code'] ?>" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="<?= $values['use_city'] ?>" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="<?= $values['use_phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays) + votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="<?= $values['use_fax'] ?>" placeholder="N° de fax (Optionel - Format: (00 + Code Pays) + votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="password" type="password" name="password" value="" placeholder="Enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left" class="ng-scope ng-pristine ng-valid-pattern ng-valid ng-valid-required">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="passwordVerif" type="password" name="passwordVerif" value="" placeholder="Re-enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Valider les modifications" href="#"><i class="fa fa-pencil fa-fw"></i> Valider les modifications</button>
            <span class="help-block"></span>
            <h4>Une fois les données modifiées, vous serez redirigé vers la page d'accueil.</h4>
        </form>
    </div>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
