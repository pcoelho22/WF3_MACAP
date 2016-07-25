<?php $this->layout('layout', ['title' => 'News Details  !']) ?>

<?php $this->start('main_content') ?>
<h2>Details</h2>
<ul><br/>
    <div class="row">
        <div class="col-md-3 text-left">
            <li><img class="avatar" src="<?= $newsDetails['con_avatar'] ?>"></li>
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
<a class="btn btn-default1" type="button" href="<?= $this->url('news_liste') ?>"><strong>&lt</strong> retour</a>
<?php $this->stop('main_content') ?>
