<?php $this->layout('layout', ['title' => 'Detail des Events']) ?>

<?php $this->start('main_content') ?>
<h2>Détail des Events</h2>
<div class="list-group">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4">
                <img class="avatar img-responsive" src="<?= $this->assetUrl($eventsId['con_avatar']) ?>">
                <span class="help-block"></span>
            </div>
            <div class="col-md-8">
                <h2 class="detailsTitle"><?= $eventsId['con_title'] ?></h2>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-12 text-justify">
                <p class="detailsdate"><strong>Date de début de l'événement: </strong> <?= $eventsId['con_date_start'] ?></p>
                <p class="detailsdate2"><strong>Date de fin de l'événement: </strong> <?= $eventsId['con_date_end'] ?></p>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-12 text-justify">
                <p class="detailsText"><?= $eventsId['con_description'] ?></p>
            </div>
        </div>
    </div>


    <?php if(isset($galeriesId['id'])): ?>
    <div class="list-group-item">
    <h2>Liste de galeries associées aux Events <?= $eventsId['con_title'] ?></h2>
        <?php foreach ($galeriesId as $key => $value) : ?>
            <a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a>
            <span class="help-block"></span>
        <?php endforeach ?>
    </div>
    <?php endif; ?> 
</div>
<div class="row">
    <div class="col-sm-12">
        <span class="help-block"></span>
        <a class="btn btn-default btn-sm" href="<?= $this->url('events_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
    </div>
</div>
<?php $this->stop('main_content') ?>