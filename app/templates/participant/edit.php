<?php $this->layout('layout', ['title' => 'Editer un exposant']) ?>

<?php $this->start('main_content') ?>
<?php debug($_POST); debug($_FILES);?>
<?php if (isset($error)){
     debug($error);
    } ?>
<?php if (isset($vals)): ?>
    <form action="" method="post" enctype="multipart/form-data">

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
<?php debug($values); ?>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="lastNamee">Last Name person in charge</label><br/>
        <input id="lastName" type="text" name="lastName" value="<?= $values['par_name'] ?>" placeholder="Ex: "><br/><br/>

        <label for="firstNamee">First Name person in charge</label><br/>
        <input id="firstName" type="text" name="firstName" value="<?= $values['par_first_name'] ?>" placeholder="Ex:"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $values['par_address'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>
        
        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="<?= $values['par_city'] ?>" placeholder="Ex:"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $values['par_post_code'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>
        
         <label for="country">Country</label><br/>
        <input id="country" type="text" name="country" value="<?= $values['par_country'] ?>" placeholder="Ex:"><br/><br/>

        <label for="phone">Numéro de Téléphone Fixe(Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $values['par_phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $values['par_fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="email">Email person in charge</label><br/>
        <input id="email" type="email" name="email" value="<?= $values['par_email'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>

        <label for="avatar">Photo</label><br/>
        <input id="avatar" type="file" name="avatar"><br/><br/>
        
        <br>
        <input type="submit" value="Editer Participant">
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
