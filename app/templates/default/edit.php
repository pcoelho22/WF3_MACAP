<?php $this->layout('layout', ['title' => 'Modifié les informations de votre compte']) ?>

<?php $this->start('main_content') ?>
<h2>Modifié les informations de votre compte</h2>
<?php if (isset($error)){
    debug($error);
}
debug($_POST);
?>

<?php if (isset($vals)): ?>
    <form action="" method="post">
        <label for="name">Last Name</label><br/>
        <input id="name" type="text" name="lastName" value="<?= $vals['use_name'] ?>" placeholder="Ex: Reuter"><br/><br/>

        <label for="firstName">First Name</label><br/>
        <input id="firstName" type="text" name="firstName" value="<?= $vals['use_firstName'] ?>" placeholder="Ex: Paul"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $vals['use_adress'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>

        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="<?= $vals['use_city'] ?>" placeholder="Ex: Belval"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $vals['use_post_code'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>

        <label for="phone">Numéro de Téléphone (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $vals['use_phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $vals['use_fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="password">Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)</label><br/>
        <input id="password" type="password" name="password" value="<?= $vals['use_password'] ?>" ><br/><br/>

        <label for="passwordVerif">Re-enter Password</label><br/>
        <input id="passwordVerif" type="password" name="passwordVerif" value="" ><br/><br/>

        <br>

        <input type="submit" value="Valider les modifications">
    </form>
    <?php elseif(isset($values)): ?>
    <?php debug($values); ?>
    <form action="" method="post">

        <label for="name">Last Name</label><br/>
        <input id="name" type="text" name="lastName" value="<?= $values['use_name'] ?>" placeholder="Ex: Reuter"><br/><br/>

        <label for="firstName">First Name</label><br/>
        <input id="firstName" type="text" name="firstName" value="<?= $values['use_firstName'] ?>" placeholder="Ex: Paul"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $values['use_adress'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux"><br/><br/>

        <label for="city">City</label><br/>
        <input id="city" type="text" name="city" value="<?= $values['use_city'] ?>" placeholder="Belval"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $values['use_post_code'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>

        <label for="phone">Numéro de Téléphone (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $values['use_phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $values['use_fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="password">Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)</label><br/>
        <input id="password" type="password" name="password" value="" ><br/><br/>

        <label for="passwordVerif">Re-enter Password</label><br/>
        <input id="passwordVerif" type="password" name="passwordVerif" value="" ><br/><br/>

        <br>
        <input type="submit" value="Valider les modifications">
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
