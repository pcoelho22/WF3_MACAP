<?php $this->layout('layout', ['title' => 'Editer un exposant']) ?>

<?php $this->start('main_content') ?>
<?php debug($_POST); debug($_FILES);?>
<?php if (isset($error)){
     debug($error);
    } ?>
<?php if (isset($vals)): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nameExposant">Nom de l'Exposant</label><br/>
        <input id="nameExposant" type="text" name="nameExposant" value="<?= $vals['nameExposant'] ?>" placeholder="Ex: "><br/><br/>

        <label for="lastNameInCharge">Last Name person in charge</label><br/>
        <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $vals['lastNameInCharge'] ?>" placeholder="Ex: "><br/><br/>

        <label for="firstNameInCharge">First Name person in charge</label><br/>
        <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $vals['firstNameInCharge'] ?>" placeholder="Ex:"><br/><br/>

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
        
        <label for="mobile">Numéro de Téléphone/GSM (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="mobile">Exemple: 00352-11 11 11 11</label><br/>
        <input id="mobile" type="text" name="mobile" value="<?= $vals['mobile'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="emailInCharge">Email person in charge</label><br/>
        <input id="emailInCharge" type="email" name="emailInCharge" value="<?= $vals['emailInCharge'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>
        
        <label for="emailGeneral">Email Genral</label><br/>
        <input id="emailGeneral" type="email" name="emailGeneral" value="<?= $vals['emailGeneral'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>
        
        <label for="description">Descriotion</label><br/>
        <textarea id="description" name="description" rows="10" cols="40"><?= $vals['description'] ?></textarea><br/><br/>
        
        <label for="url">Site internet</label><br/>
        <input id="url" type="text" name="url" value="<?= $vals['url'] ?>" placeholder="Ex: http://www.votresite.com"><br/><br/>

        <label for="avatar">Photo</label><br/>
        <input id="avatar" type="file" name="avatar"><br/><br/>

        <br>
        <input type="submit" value="Editer Exposant">
    </form>
<?php elseif(isset($values)): ?>
<?php debug($values); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nameExposant">Nom de l'Exposant</label><br/>
        <input id="nameExposant" type="text" name="nameExposant" value="<?= $values['exp_name_exposants'] ?>" placeholder="Ex: "><br/><br/>

        <label for="lastNameInCharge">Last Name person in charge</label><br/>
        <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $values['exp_name_in_charge'] ?>" placeholder="Ex: "><br/><br/>

        <label for="firstNameInCharge">First Name person in charge</label><br/>
        <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $values['exp_first_name_in_charge'] ?>" placeholder="Ex:"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $values['exp_address'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>
        
        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="<?= $values['exp_city'] ?>" placeholder="Ex:"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $values['exp_post_code'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>
        
         <label for="country">Country</label><br/>
        <input id="country" type="text" name="country" value="<?= $values['exp_country'] ?>" placeholder="Ex:"><br/><br/>

        <label for="phone">Numéro de Téléphone Fixe(Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $values['exp_phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>
        
        <label for="mobile">Numéro de Téléphone/GSM (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="mobile">Exemple: 00352-11 11 11 11</label><br/>
        <input id="mobile" type="text" name="mobile" value="<?= $values['exp_mobile'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $values['exp_fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="emailInCharge">Email person in charge</label><br/>
        <input id="emailInCharge" type="email" name="emailInCharge" value="<?= $values['exp_email_incharge'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>
        
        <label for="emailGeneral">Email general</label><br/>
        <input id="emailGeneral" type="email" name="emailGeneral" value="<?= $values['exp_email_general'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>

        <label for="description">Description</label><br/>
        <textarea id="description" name="description" rows="10" cols="40"><?= $values['exp_description_exposants'] ?></textarea><br/><br/>
        
        <label for="url">Site exposant</label><br/>
        <input id="url" type="text" name="url" value="<?= $values['exp_url'] ?>" placeholder="Ex: http://www.votresite.com"><br/><br/>

        <label for="avatar">Photo</label><br/>
        <input id="avatar" type="file" name="avatar"><br/><br/>
        
        <br>
        <input type="submit" value="Editer Exposant">
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
