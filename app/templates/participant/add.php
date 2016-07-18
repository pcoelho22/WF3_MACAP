<?php $this->layout('layout', ['title' => 'Ajouter un participant']) ?>

<?php $this->start('main_content') ?>
<?php debug($_POST); ?>
<?php if (isset($error)){
     debug($error);
    } ?>
<?php if (isset($vals)): ?>
    <form action="" method="post">

        <label for="lastName">Last Name Participant</label><br/>
        <input id="lastName" type="text" name="lastName" value="<?= $vals['lastName'] ?>" placeholder="Ex: "><br/><br/>

        <label for="firstName">First Name Participant</label><br/>
        <input id="firstNamee" type="text" name="firstName" value="<?= $vals['firstName'] ?>" placeholder="Ex:"><br/><br/>

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

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="email">Email Participant</label><br/>
        <input id="email" type="email" name="email" value="<?= $vals['email'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>
       
        <br>
        <input type="submit" value="Ajouter Participant">
    </form>
<?php else: ?>
    <form action="" method="post">
        
        <label for="lastName">Last Name du participant</label><br/>
        <input id="lastName" type="text" name="lastName" value="" placeholder="Ex: "><br/><br/>

        <label for="firstName">First Name du participant</label><br/>
        <input id="firstName" type="text" name="firstName" value="" placeholder="Ex:"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>
        
        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="" placeholder="Ex:"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>
        
         <label for="country">Country</label><br/>
        <input id="country" type="text" name="country" value="" placeholder="Ex:"><br/><br/>

        <label for="phone">Numéro de Téléphone Fixe(Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="" placeholder="Ex: 00352-11 11 11 11"><br/><br/>
      
        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="email">Email du participant</label><br/>
        <input id="email" type="email" name="email" value="" placeholder="Ex: adedias@hotmail.com"><br/><br/>
                
        <br>
        <input type="submit" value="Ajouter Participant">
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
