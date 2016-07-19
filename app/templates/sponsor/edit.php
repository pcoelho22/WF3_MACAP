<?php $this->layout('layout', ['title' => 'Editer un exposant']) ?>

<?php $this->start('main_content') ?>
<?php debug($_POST); ?>
<?php if (isset($error)){
     debug($error);
    } ?>
<?php if (isset($vals)): ?>
    <form action="" method="post">
        <label for="nameSponsor">Nom du sponsor</label><br/>
        <input id="nameSponsor" type="text" name="nameSponsor" value="<?= $vals['nameSponsor'] ?>" placeholder="Ex: "><br/><br/>

        <label for="lastNameInCharge">Last Name person in charge</label><br/>
        <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $vals['lastNameInCharge'] ?>" placeholder="Ex: "><br/><br/>

        <label for="firstNameInCharge">First Name person in charge</label><br/>
        <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $vals['firstNameInCharge'] ?>" placeholder="Ex:"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $vals['adress'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>
        
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
        
        <label for="url">Site internet</label><br/>
        <input id="url" type="text" name="url" value="<?= $vals['url'] ?>" placeholder="Ex: http://www.votresite.com"><br/><br/>
       
        <br>
        <input type="submit" value="Editer Sponsor">
    </form>
<?php elseif(isset($values)): ?>
<?php debug($values); ?>
    <form action="" method="post">
        <label for="nameSponsor">Nom de l'Exposant</label><br/>
        <input id="nameSponsor" type="text" name="nameSponsor" value="<?= $values['spo_name_sponsors'] ?>" placeholder="Ex: "><br/><br/>

        <label for="lastNameInCharge">Last Name person in charge</label><br/>
        <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $values['spo_name_in_charge'] ?>" placeholder="Ex: "><br/><br/>

        <label for="firstNameInCharge">First Name person in charge</label><br/>
        <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $values['spo_firs_name_in_charge'] ?>" placeholder="Ex:"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $values['spo_adress'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>
        
        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="<?= $values['spo_city'] ?>" placeholder="Ex:"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $values['spo_post_code'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>
        
         <label for="country">Country</label><br/>
        <input id="country" type="text" name="country" value="<?= $values['spo_country'] ?>" placeholder="Ex:"><br/><br/>

        <label for="phone">Numéro de Téléphone Fixe(Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $values['spo_phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>
        
        <label for="mobile">Numéro de Téléphone/GSM (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="mobile">Exemple: 00352-11 11 11 11</label><br/>
        <input id="mobile" type="text" name="mobile" value="<?= $values['spo_mobile'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $values['spo_fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="emailInCharge">Email person in charge</label><br/>
        <input id="emailInCharge" type="email" name="emailInCharge" value="<?= $values['spo_email_incharge'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>
        
        <label for="emailGeneral">Email general</label><br/>
        <input id="emailGeneral" type="email" name="emailGeneral" value="<?= $values['spo_email_general'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>
        
        <label for="url">Site exposant</label><br/>
        <input id="url" type="text" name="url" value="<?= $values['spo_url'] ?>" placeholder="Ex: http://www.votresite.com"><br/><br/>
        
        <br>
        <input type="submit" value="Editer Exposant">
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
