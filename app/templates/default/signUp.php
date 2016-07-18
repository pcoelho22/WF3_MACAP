<?php $this->layout('layout', ['title' => 'Se crée un compte']) ?>

<?php $this->start('main_content') ?>
<h2>Se crée un compte</h2>

<?php if (isset($vals)): ?>
    <form action="" method="post">
        <label for="userName">Username (5 charactères minimum)</label><br/>
        <input id="userName" type="text" name="userName" value="<?= $vals['username'] ?>" placeholder="Ex: ClauPat"><br/><br/>

        <label for="name">Last Name</label><br/>
        <input id="name" type="text" name="lastName" value="<?= $vals['lastName'] ?>" placeholder="Ex: Reuter"><br/><br/>

        <label for="firstName">First Name</label><br/>
        <input id="firstName" type="text" name="firstName" value="<?= $vals['firstName'] ?>" placeholder="Ex: Paul"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="<?= $vals['adress'] ?>" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="<?= $vals['zip'] ?>" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>

        <label for="phone">Numéro de Téléphone (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="<?= $vals['phone'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="email">Email</label><br/>
        <input id="email" type="email" name="email" value="<?= $vals['email'] ?>" placeholder="Ex: adedias@hotmail.com"><br/><br/>

        <label for="password">Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)</label><br/>
        <input id="password" type="password" name="password" value="<?= $vals['password'] ?>" ><br/><br/>

        <label for="passwordVerif">Re-enter Password</label><br/>
        <input id="passwordVerif" type="password" name="passwordVerif" value="" ><br/><br/>

        <fieldset>
            <legend>Dans quel catégorie souhaitez vous participez? (plusieurs choix possibles)</legend>

            Participant:<input type="checkbox" name="role[]" value="participant" <?= $vals['role']['participant'] ?> ><br>

            Exposant:<input type="checkbox" name="role[]" value="exposant" <?= $vals['role']['exposant'] ?> ><br>

            Sponsor:<input type="checkbox" name="role[]" value="sponsor" <?= $vals['role']['sponsor'] ?> ><br>

            Rally:<input type="checkbox" name="role[]" value="rally" <?= $vals['role']['rally'] ?> ><br>
        </fieldset>
        <br>

        <input type="submit" value="Sign Up">
    </form>
<?php else: ?>
    <form action="" method="post">
        <label for="userName">Username (5 charactères minimum)</label><br/>
        <input id="userName" type="text" name="userName" value="" placeholder="Ex: ClauPat"><br/><br/>

        <label for="name">Last Name</label><br/>
        <input id="name" type="text" name="lastName" value="" placeholder="Ex: Reuter"><br/><br/>

        <label for="firstName">First Name</label><br/>
        <input id="firstName" type="text" name="firstName" value="" placeholder="Ex: Paul"><br/><br/>

        <label for="adress">Adress</label><br/>
        <input id="adress" type="text" name="adress" value="" placeholder="Ex:9, Rue des Hauts Founeaux, Belval"><br/><br/>

        <label for="postCode">Code Postal</label><br/>
        <input id="postCode" type="text" name="postCode" value="" placeholder="Ex: 4362 Esch-sur-Alzette"><br/><br/>

        <label for="phone">Numéro de Téléphone (Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="phone">Exemple: 00352-11 11 11 11</label><br/>
        <input id="phone" type="text" name="phone" value="" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="fax">Numéro de Fax (Optionel - Format: (00 + Code Pays)-Votre numero)</label><br/>
        <label for="fax">Exemple: 00352-11 11 11 11</label><br/>
        <input id="fax" type="text" name="fax" value="" placeholder="Ex: 00352-11 11 11 11"><br/><br/>

        <label for="email">Email</label><br/>
        <input id="email" type="email" name="email" value="" placeholder="Ex: adedias@hotmail.com"><br/><br/>

        <label for="password">Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)</label><br/>
        <input id="password" type="password" name="password" value="" ><br/><br/>

        <label for="passwordVerif">Re-enter Password</label><br/>
        <input id="passwordVerif" type="password" name="passwordVerif" value="" ><br/><br/>
        <fieldset>
            <legend>Dans quel catégorie souhaitez vous participez? (plusieurs choix possibles)</legend>

            Participant:<input type="checkbox" name="role[]" value="participant"><br>

            Exposant:<input type="checkbox" name="role[]" value="exposant"><br>

            Sponsor:<input type="checkbox" name="role[]" value="sponsor"><br>

            Rally:<input type="checkbox" name="role[]" value="rally"><br>
        </fieldset>
        <br>
        <input type="submit" value="Sign Up">
    </form>
<?php endif; ?>
<h1>Une fois l'inscription validée, vous serez redirigé vers la page d'accueil</h1>
<?php if (isset($error)){
    foreach ($error as $value){
        echo $value."</br>";
    }
}

print_r($_POST)?>

<?php $this->stop('main_content') ?>
