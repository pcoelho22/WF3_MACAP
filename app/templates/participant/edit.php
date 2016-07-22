<?php $this->layout('layout', ['title' => 'Editer un exposant']) ?>

<?php $this->start('main_content') ?>
<h1>Editer un exposant</h1>
<div class="row">

    <div class="col-md-7 text-left">
        <?php if (isset($vals)): ?>
        <form action="" method="post" enctype="multipart/form-data" role="form">
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input id="lastname" type="text" name="lastName" value="<?= $vals['lastName'] ?>" required="" placeholder="Nom" class="form-control text-left">
        </div>
        
        <label for="lastName">Last Name person in charge</label><br/>
        <input id="lastName" type="text" name="lastName" value="<?= $vals['lastName'] ?>" placeholder="Ex:"><br/><br/>

        <label for="firstName">First Name person in charge</label><br/>
        <input id="firstName" type="text" name="firstName" value="<?= $vals['firstName'] ?>" placeholder="Ex:"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $vals['address'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>
        
        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="<?= $vals['city'] ?>" placeholder="Ex:"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $vals['zip'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>
        
         <label for="country">Country</label><br/>
        <input id="country" type="text" name="country" value="<?= $vals['country'] ?>" placeholder="Ex:"><br/><br/>

        <label for="phone">Numéro de Téléphone Fixe(Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $vals['phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="email">Email person in charge</label><br/>
        <input id="email" type="email" name="email" value="<?= $vals['email'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>

        <label for="avatar">Photo</label><br/>
        <input id="avatar" type="file" name="avatar"><br/><br/>

        <br>
        <input type="submit" value="Editer Participant">
    </form>

<?php elseif(isset($values)): ?>

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
            <input id="adress" type="text" name="adress" value="<?= $values['par_address'] ?>" placeholder="N° et rue" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
            <input id="city" type="text" name="city" value="<?= $values['par_city'] ?>" placeholder="Ville" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
            <input id="postCode" type="text" name="postCode" value="<?= $values['par_post_code'] ?>" placeholder="Code postal" class="form-control text-left">
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
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input id="avatar" type="file" name="avatar" value="<?= $vals['email'] ?>" placeholder="Photo" class="form-control text-left">
        </div>
        <span class="help-block"></span>
        <button class="btn btn-primary btn-sm active" type="submit" value="Editer Participant" href="#"><i class="fa fa-user fa-fw"></i> Editer Participant</button>
        <br>
        <h4>Une fois l'édition validée, vous serez redirigé vers la page d'accueil.</h4>
    </form>
<?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
