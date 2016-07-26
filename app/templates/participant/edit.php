<?php $this->layout('layout', ['title' => 'Editer un participant']) ?>

<?php $this->start('main_content') ?>
<h2>Editer un participant</h2>
<div class="row">

    <div class="col-md-7 text-left">
        <?php if (isset($vals)): ?>
            <form action="" method="post" enctype="multipart/form-data" role="form">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="lastname" type="text" name="lastName" value="<?= $vals['lastName'] ?>" required="" placeholder="Nom" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="firstName" type="text" name="firstName" value="<?= $vals['firstName'] ?>" placeholder="Prénom" class="form-control text-left">
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
                    <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                    <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input id="email" type="email" name="email" value="<?= $vals['email'] ?>" placeholder="Email" class="form-control text-left">
                </div>
                <h5><strong>Veuillez sélectionner une photo à ajouter à votre profil (optionnel).</strong></h5>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                    <input id="avatar" type="file" name="avatar" value="<?= $vals['email'] ?>" placeholder="Veuillez ajouter une photo" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter Participant" href="#"><i class="fa fa-pencil fa-fw"></i>Editer un Participant</button>
                <br>
                <h4>Une fois l'édition validée, vous serez redirigé vers la page d'accueil.</h4>
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

        <form action="" method="post" enctype="multipart/form-data" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="lastName" type="text" name="lastName" value="<?= $values['par_name'] ?>" required="" placeholder="Nom de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstName" type="text" name="firstName" value="<?= $values['par_first_name'] ?>" placeholder="Prénom de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="address" type="text" name="address" value="<?= $values['par_address'] ?>" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="<?= $values['par_post_code'] ?>" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="<?= $values['par_city'] ?>" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                <input id="country" type="text" name="country" value="<?= $values['par_country'] ?>" placeholder="Pays" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="<?= $values['par_phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="<?= $values['par_fax'] ?>" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="email" type="email" name="email" value="<?= $values['par_email'] ?>" placeholder="Email de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <h5><strong>Veuillez sélectionner une photo à ajouter à votre profil (optionnel).</strong></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                <input id="avatar" type="file" name="avatar" value="<?= $vals['email'] ?>" placeholder="Veuillez ajouter une photo" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Editer Participant" href="#"><i class="fa fa-pencil fa-fw"></i>Editer un Participant</button>
            <br>
            <h4>Une fois l'édition validée, vous serez redirigé vers la page d'accueil.</h4>
        </form>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>