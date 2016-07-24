<?php $this->layout('layout', ['title' => 'Editer un sponsor']) ?>

<?php $this->start('main_content') ?>
<h1>Editer un sponsor</h1>
<div class="row">

    <div class="col-md-7 text-left">
        <?php if (isset($vals)): ?>
            <form action="" method="post" enctype="multipart/form-data" role="form">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="nameSponsor" type="text" name="nameSponsor" value="<?= $vals['spo_name_sponsors'] ?>" required="" placeholder="Nom du sponsor" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $vals['spo_name_in_charge'] ?>" required="" placeholder="Nom de la personne en charge" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $vals['spo_first_name_in_charge'] ?>" required="" placeholder="Prénom de la personne en charge" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                    <input id="address" type="text" name="address" value="<?= $vals['spo_address'] ?>" placeholder="N° et rue" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                    <input id="postCode" type="text" name="postCode" value="<?= $vals['spo_post_code'] ?>" placeholder="Code postal" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                    <input id="city" type="text" name="city" value="<?= $vals['spo_city'] ?>" placeholder="Ville" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                    <input id="country" type="text" name="country" value="<?= $vals['spo_country'] ?>" placeholder="Pays" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                    <input id="phone" type="text" name="phone" value="<?= $vals['spo_phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                    <input id="mobile" type="text" name="mobile" value="<?= $vals['spo_mobile'] ?>" placeholder="N° de GSM (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-6xx-00 00 00" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                    <input id="fax" type="text" name="fax" value="<?= $vals['spo_fax'] ?>" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input id="emailInCharge" type="email" name="emailInCharge" value="<?= $vals['spo_email_incharge'] ?>" placeholder="Email de la personne en charge" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input id="emailGeneral" type="email" name="emailGeneral" value="<?= $vals['spo_email_general'] ?>" placeholder="Email principal" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                    <input id="url" type="text" name="url" value="<?= $vals['spo_url'] ?>" placeholder="Site web du sponsor" class="form-control text-left">
                </div>
                <span class="help-block"></span>
                <h5><strong>Veuillez sélectionner une photo à ajouter à votre profil (optionnel).</strong></h5>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                    <input id="avatar" type="file" name="avatar" class="form-control text-left">
                </div>

                <?php if ($_SESSION['users']['use_role_opt1'] === '2'): ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                        <select name="type" id="type">
                            <?php foreach ($listTypeSponsor as $type): ?>
                                <option value="<?= $type['id'] ?>"><?= $type['typ_spon_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <span class="help-block"></span>
                <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter Sponsor" href="#"><i class="fa fa-user fa-fw"></i> Editer Sponsor</button>
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
                <input id="nameSponsor" type="text" name="nameSponsor" value="<?= $values['spo_name_sponsors'] ?>" required="" placeholder="Nom du sponsor" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="lastNameInCharge" type="text" name="lastNameInCharge" value="<?= $values['spo_name_in_charge'] ?>" required="" placeholder="Nom de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input id="firstNameInCharge" type="text" name="firstNameInCharge" value="<?= $values['spo_first_name_in_charge'] ?>" required="" placeholder="Prénom de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                <input id="address" type="text" name="address" value="<?= $values['spo_address'] ?>" placeholder="N° et rue" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags fa-fw" aria-hidden="true"></i></span>
                <input id="postCode" type="text" name="postCode" value="<?= $values['spo_post_code'] ?>" placeholder="Code postal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                <input id="city" type="text" name="city" value="<?= $values['spo_city'] ?>" placeholder="Ville" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                <input id="country" type="text" name="country" value="<?= $values['spo_country'] ?>" placeholder="Pays" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="phone" type="text" name="phone" value="<?= $values['spo_phone'] ?>" placeholder="N° de téléphone (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                <input id="mobile" type="text" name="mobile" value="<?= $values['spo_mobile'] ?>" placeholder="N° de GSM (Format: (00 + Code Pays)+ votre numéro) Ex: 00352-6xx-00 00 00" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fax fa-fw" aria-hidden="true"></i></span>
                <input id="fax" type="text" name="fax" value="<?= $values['spo_fax'] ?>" placeholder="N° de Fax (Optionel - Format: (00 + Code Pays)+ votre numéro) Ex: 00352-11 11 11 11" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="emailInCharge" type="email" name="emailInCharge" value="<?= $values['spo_email_incharge'] ?>" placeholder="Email de la personne en charge" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="emailGeneral" type="email" name="emailGeneral" value="<?= $values['spo_email_general'] ?>" placeholder="Email principal" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                <input id="url" type="text" name="url" value="<?= $values['spo_url'] ?>" placeholder="Site web du sponsor" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <h5><strong>Veuillez sélectionner une photo à ajouter à votre profil (optionnel).</strong></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o fa-fw"></i></span>
                <input id="avatar" type="file" name="avatar" class="form-control text-left">
            </div>

            <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                    <select name="type" id="type">
                        <?php foreach ($listTypeSponsor as $type): ?>
                            <option value="<?= $type['id'] ?>"><?= $type['typ_spon_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Ajouter Sponsor" href="#"><i class="fa fa-user fa-fw"></i> Editer Sponsor</button>
            <br>
            <h4>Une fois l'édition validée, vous serez redirigé vers la page d'accueil.</h4>
        </form>
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
