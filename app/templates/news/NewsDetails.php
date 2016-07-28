<?php $this->layout('layout', ['title' => 'News details!']) ?>

<?php $this->start('main_content') ?>
<h2>News details</h2>
<ul><br/>
    <div class="row">
        <div class="col-md-3 text-left">
            <li><img class="avatar" src="<?= $this->assetUrl($newsDetails['con_avatar']) ?>"></li>
        </div>
        <div class="col-md-8 text-left">
            <li><h3 class="detailsTitle"><?= $newsDetails['con_title'] ?></h3></li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            <li><p class="detailsdate"><?= $newsDetails['con_date_start'] ?></p></li>
            <li><p class="detailsdate2">Dernière mise à jour: <?= $newsDetails['con_date_end'] ?></p></li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            <li><p class="detailsText"><?= $newsDetails['con_description'] ?></p></li>
        </div>
    </div>
</ul>
<?php if(isset($eventsIdGaleires['id'])): ?>
<h2>Liste de galeries associées à <?= $newsDetails['con_title'] ?></h2>
<ul>
    <?php foreach ($eventsIdGaleires as $key => $value) : ?>
        <li><a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a></li><br/>
    <?php endforeach ?>
</ul>
<?php endif; ?> 
<div class="row">
    <div class="col-sm-12">
        <span class="help-block"></span>
        <a class="btn btn-default btn-sm" href="<?= $this->url('news_liste') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
