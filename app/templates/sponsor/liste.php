<?php $this->layout('layout', ['title' => 'Sponsors !']) ?>

<?php $this->start('main_content') ?>
<ul>
    <?php foreach ($sponsorListe as $key => $value) : ?>
        <li><a href="<?= $value['spo_url'] ?>" target="_blank"><img src="<?= $this->assetUrl($value['spo_avatar']) ?>"></a></li><br/>
    <?php endforeach ?>
</ul>

<div class="col-md-12">
    <h2>Nos sponsors</h2>
    <p><strong>Le Mondor-les-Bains Concours d'Elegance tient à remercier ses sponsors qui souscrivent généreusement à cet événement. Leur soutien financier important nous permet de maintenir notre engagement envers l'excellence et poursuivre nos efforts au profit de nos oeuvres de bienfaisance.</strong></p><br>
</div>

<div id="sponsorLogos" class="col-md-12 block-center">
    <div class="col-md-12 text-center">
        <h4 class="background"><span><strong>Premium Sponsors</strong></span></h4><br>
    </div>
    <div class="row">
        <div class="col-md-3 text-center">
            <a href="http://www.casino2000.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/premium sponsors/Casino.png') ?>"></a>
        </div>
        <div class="col-md-3 text-center">
            <a href="http://www.brm-manufacture.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/premium sponsors/BRM.png') ?>"></a>
        </div>
        <div class="col-md-3 text-center">
            <a href="https://www.degroofpetercam.com/index" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/premium sponsors/logo_degroof.jpg') ?>"></a>
        </div>
        <div class="col-md-3 text-center">
            <a href="http://www.autopolis.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/premium sponsors/logo-autopolis.png') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 text-center">
            <a href="http://www.rollinger.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/premium sponsors/Rollinger.png') ?>"></a>
        </div>
        <div class="col-md-3 text-center">
            <a href="http://www.gdc.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/premium sponsors/GDCI_logo.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="col-md-12 text-center">
        <h4 class="background"><span><strong>Automotive Sponsors</strong></span></h4><br>
    </div>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://luxembourg.astonmartindealers.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/astonmartin.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.lotuscars.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/logo_lotus.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.jaguar.be/fr/luxembourg/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/jaguar.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.alfaromeo.lu/lu/accueil" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/logo_alfaromeo.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.landrover-dealer.be/land-rover-luxembourg/fr/home/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/landrover.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.ford.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/ford.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="https://www.tesla.com/fr_LU/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/Tesla_logo.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="https://www.rolls-roycemotorcars.com" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/rollsroyce.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.mclaren.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/mclaren.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.ferrari.com/fr_lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/ferrari.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.lexus.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/Lexus.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="https://www.bentleymotors.com" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/bentley.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.lamborghini.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/lamborghini.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.hdl.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/automotive sponsors/HarleyDavidson_logo.png') ?>"></a>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <h4 class="background"><span><strong>Sponsors</strong></span></h4><br>
    </div>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.soludec.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/soludec_logo.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.demyschandeler.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo_demyschandeler.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.codex.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo_codex.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.apl.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/apl_logo.png') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="https://www.hotelspreference.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/hotelpreference_logo.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.oldtimer.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/oldtimer.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.mondorf.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/Mondorf Thermal.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.ilcolux.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo_ilcolux.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.curridor.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo_curridor.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.post.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/post_luxembourg.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.gales.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/Logo_CavesGales.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.ang.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo_ang.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://securitec.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/Securitec_logo.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.kiwanis.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo_kiwanis.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.oil-pad.eu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/oilpad_logo.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.steinhauser.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/fachmaart-logo.png') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.mondorf-les-bains.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/sponsors/logo mondorf.png') ?>"></a>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <h4 class="background"><span><strong>Media Partners</strong></span></h4><br>
    </div>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.lva.fr/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/media partners/Logo_Vie_lAuto.jpg') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://classicandsportscar-magazine.fr/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/media partners/logo_classicsportcar.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.garedepoca.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/media partners/GareEpoca_logo.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.epocauto.it/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/media partners/logo_epocAuto.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://www.rtl.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/media partners/rtl_logo.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.magazinepremium.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/media partners/LOGO-PREMIUM.jpg') ?>"></a>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <h4 class="background"><span><strong>Friends</strong></span></h4><br>
    </div>
    <div class="row">
        <div class="col-md-3 texte-center">
            <a href="http://group.chem-tools.com/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/friends/logo_chemtools.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="https://www.avd.de/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/friends/AvD_logo.gif') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.ferrariandfriends.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/friends/logo_ferrariFriends.png') ?>"></a>
        </div>
        <div class="col-md-3 texte-center">
            <a href="http://www.luxembourg.public.lu/" target="_blank"><img src="<?= $this->assetUrl('../assets/logo/friends/visitluxembourg_logo.jpg') ?>"></a>
        </div>
    </div>
    <span class="help-block"></span>
</div>

<?php $this->stop('main_content') ?>
