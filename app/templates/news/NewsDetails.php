<?php $this->layout('layout', ['title' => 'Detail des News']) ?>

<?php $this->start('main_content') ?>
<h2>Détail des News</h2>
<div class="list-group">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4">
                <img class="avatar img-responsive" src="<?= $this->assetUrl($newsDetails['con_avatar']) ?>">
                <span class="help-block"></span>
            </div>

            <div class="col-md-8">
                <h2><?= $newsDetails['con_title'] ?></h2>
                <span class="help-block"></span>
            </div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-12 text-justify">
                <p class="detailsdate"><strong><?= $newsDetails['con_date_start'] ?></strong></p>
                <p class="detailsdate2"><strong>Dernière mise à jour: <?= $newsDetails['con_date_end'] ?></strong></p>
            </div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-12 text-justify">
                <p><?= $newsDetails['con_description'] ?></p>
            </div>
        </div>
    </div>

    <div class="list-group-item">
        <h4>Liste de galeries associées à <?= $newsDetails['con_title'] ?></h4>
        <?php if(isset($eventsIdGaleires['id'])): ?>
            <?php foreach ($eventsIdGaleires as $key => $value) : ?>
                <li><a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a></li><br/>
            <?php endforeach ?>
        <?php endif; ?> 
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <span class="help-block"></span>
        <a class="btn btn-default btn-sm" href="<?= $this->url('news_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
