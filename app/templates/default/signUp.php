<?php $this->layout('layout', ['title' => 'Créer un compte']) ?>

<?php $this->start('main_content') ?>

<h1>Création de votre compte</h1>
<h4>Créez votre compte en complétant le formulaire ci-dessous.</h4>
<div class="row">
    
    <div class="col-md-7 text-left">
        <?php if (isset($vals)): ?>
        <form action="#" method="post" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i></span>
                <input id="userName" type="text" name="userName" value="<?= $vals['username'] ?>" required="" placeholder="Username (5 charactères minimum)" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="name" type="text" name="lastName" value="<?= $vals['lastName'] ?>" required="" placeholder="Nom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstName" type="text" name="firstName" value="<?= $vals['firstName'] ?>" placeholder="Prénom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="adress" type="text" name="adress" value="<?= $vals['adress'] ?>" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="<?= $vals['city'] ?>" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="<?= $vals['zip'] ?>" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="<?= $vals['phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays) + votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="<?= $vals['fax'] ?>" placeholder="N° de fax (Optionel - Format: (00 + Code Pays) + votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="email" type="email" name="email" value="<?= $vals['email'] ?>" placeholder="Email" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="password" type="password" name="password" value="<?= $vals['password'] ?>" placeholder="Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left" class="ng-scope ng-pristine ng-valid-pattern ng-valid ng-valid-required">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="passwordVerif" type="password" name="passwordVerif" value="<?= $vals['password'] ?>" placeholder="Re-enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
            
            <h4>Dans quel catégorie souhaitez-vous participez? (plusieurs choix possibles)</h4>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="role[]" value="participant" <?= $vals['role']['participant'] ?> > Participant
                </label>
                <label>
                    <input type="checkbox" name="role[]" value="exposant" <?= $vals['role']['exposant'] ?> > Exposant
                </label>
                <label>
                    <input type="checkbox" name="role[]" value="sponsor" <?= $vals['role']['sponsor'] ?> > Sponsor
                </label>
                <label>
                    <input type="checkbox" name="role[]" value="rally" <?= $vals['role']['rally'] ?> > Rally
                </label>
            </div>
            
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Créer mon compte" href="#"><i class="fa fa-user fa-fw"></i> Créer mon compte</button>
            <span class="help-block"></span>
            <h4>Une fois l'inscription validée, vous serez redirigé vers la page d'accueil</h4>
        </form>
    </div>

    <?php if (isset($error)): ?>
    <div class="col-md-5 text-left">
        <div class="alert alert-danger fade in" rows="auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Erreur!</strong><br>
            <ul>
                <?php foreach ($error as $value):?>
                    <li><?= $value ?></li>
                <?php endforeach; ?>    
            </ul>
        </div>
    </div> 
    <?php endif; ?> 

    <?php else: ?>
        
        <form action="#" method="post" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i></span>
                <input id="userName" type="text" name="userName" value="" required="" placeholder="Username (5 charactères minimum)" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="name" type="text" name="lastName" value="" required="" placeholder="Nom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstName" type="text" name="firstName" value="" placeholder="Prénom" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="adress" type="text" name="adress" value="" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="" placeholder="N° de téléphone (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="email" type="email" name="email" value="" placeholder="Email" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="password" type="password" name="password" value="" placeholder="Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left" class="ng-scope ng-pristine ng-valid-pattern ng-valid ng-valid-required">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input id="passwordVerif" type="password" name="passwordVerif" value="" placeholder="Re-enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
            
            <h4>Dans quel catégorie souhaitez-vous participez? (plusieurs choix possibles)</h4>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="role[]" value="participant" > Participant
                </label>
                <label>
                    <input type="checkbox" name="role[]" value="exposant" > Exposant
                </label>
                <label>
                    <input type="checkbox" name="role[]" value="sponsor" > Sponsor
                </label>
                <label>
                    <input type="checkbox" name="role[]" value="rally" > Rally
                </label>
            </div>
            
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Créer mon compte" href="#"><i class="fa fa-user fa-fw"></i> Créer mon compte</button>
            <br>
            <h4>Une fois l'inscription validée, vous serez redirigé vers la page d'accueil.</h4>
        </form>

    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
