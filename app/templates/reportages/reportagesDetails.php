<?php $this->layout('layout', ['title' => 'Details des Reportages']) ?>

<?php $this->start('main_content') ?>
<h2>Détails des Reportages</h2>
<div class="list-group">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4">
                <img class="avatar img-responsive" src="<?= $this->assetUrl($reportagesDetails['con_avatar']) ?>">
                <span class="help-block"></span>
            </div>

            <div class="col-md-8">
                <h3 class="detailsTitle"><?= $reportagesDetails['con_title'] ?></h3>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
     
    <div class="list-group-item">   
        <div class="row">
            <div class="col-md-12 text-justify">
                <p class="detailsdate"><?= $reportagesDetails['con_date_start'] ?></p>
                <p class="detailsdate2">Dernière mise à jour: <?= $reportagesDetails['con_date_end'] ?></p>
            </div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-12 text-justify">
                <p class="detailsText"><?= $reportagesDetails['con_description'] ?></p>
            </div>
        </div>
    </div>

    <?php if(isset($galeriesId) && !empty($galeriesId)): ?>
    <div class="list-group-item">
        <h4>Liste de galeries associées à <?= $reportagesDetails['con_title'] ?></h4>
        <?php foreach ($galeriesId as $key => $value) : ?>
        <a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a>
        <?php endforeach ?>
    </div>
    <?php endif; ?> 
</div>

<div class="row">
    <div class="col-sm-12">
        <span class="help-block"></span>
         <a class="btn btn-default btn-sm" href="<?= $this->url('reportages_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
