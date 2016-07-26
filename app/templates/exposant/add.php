<?php $this->layout('layout', ['title' => 'Ajouter un exposant']) ?>

<?php $this->start('main_content') ?>
<h2>Ajouter un Exposant</h2>
<div class="row">

    <div class="col-md-7 text-left">
        <?php if (isset($vals)): ?>
        <form action="" method="post" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="nameExposant" type="text" name="nameExposant" value="<?= $vals['nameExposant'] ?>" required="" placeholder="Nom de l'exposant" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $vals['lastNameInCharge'] ?>" required="" placeholder="Nom de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $vals['firstNameInCharge'] ?>" required="" placeholder="Prénom de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="address" type="text" name="address" value="<?= $vals['address'] ?>" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="<?= $vals['zip'] ?>" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="<?= $vals['city'] ?>" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                <input id="country" type="text" name="country" value="<?= $vals['country'] ?>" placeholder="Pays" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="<?= $vals['phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="mobile" type="text" name="mobile" value="<?= $vals['mobile'] ?>" placeholder="N° de GSM (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-6xx-00 00 00" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="emailInCharge" type="email" name="emailInCharge" value="<?= $vals['emailInCharge'] ?>" placeholder="Email de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="emailGeneral" type="email" name="emailGeneral" value="<?= $vals['emailGeneral'] ?>" placeholder="Email principal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <textarea id="description" type="text" name="description" rows="10" value="<?= $vals['description'] ?>" placeholder="Description" class="form-control text-left"></textarea>
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <input id="url" type="text" name="url" value="<?= $vals['url'] ?>" placeholder="Site web de l'exposant" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter Exposant" href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Ajouter l'Exposant</button>
            <br>
            <h4>Une fois l'ajout validé, vous serez redirigé vers la page d'accueil.</h4>
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

    <?php else: ?>
    <form action="" method="post" role="form">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input id="nameExposant" type="text" name="nameExposant" value="" required="" placeholder="Nom de l'exposant" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="" required="" placeholder="Nom de la personne en charge" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="" required="" placeholder="Prénom de la personne en charge" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
            <input id="address" type="text" name="address" value="" placeholder="N° et rue" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
            <input id="postCode" type="text" name="postCode" value="" placeholder="Code postal" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
            <input id="city" type="text" name="city" value="" placeholder="Ville" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
            <input id="country" type="text" name="country" value="" placeholder="Pays" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
            <input id="phone" type="text" name="phone" value="" placeholder="N° de téléphone (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
            <input id="mobile" type="text" name="mobile" value="" placeholder="N° de GSM (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-6xx-00 00 00" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
            <input id="fax" type="text" name="fax" value="" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <input id="emailInCharge" type="email" name="emailInCharge" value="" placeholder="Email de la personne en charge" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <input id="emailGeneral" type="email" name="emailGeneral" value="" placeholder="Email principal" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
            <textarea id="description" type="text" name="description" rows="10" value="" placeholder="Description" class="form-control text-left"></textarea>
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
            <input id="url" type="text" name="url" value="" placeholder="Site web de l'exposant" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter Exposant" href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Ajouter l'Exposant</button>
        <br>
        <h4>Une fois l'ajout validé, vous serez redirigé vers la page d'accueil.</h4>
    </form>

    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
