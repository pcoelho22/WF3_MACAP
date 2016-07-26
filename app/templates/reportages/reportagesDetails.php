<?php $this->layout('layout', ['title' => 'Reportages detailes!']) ?>

<?php $this->start('main_content') ?>
<h2>Reportage details</h2>
<ul><br/>
    <div class="row">
        <div class="col-md-3 text-left">
            <li><img class="avatar" src="<?= $reportagesDetails['con_avatar'] ?>"></li>
        </div>
        <div class="col-md-8 text-left">
            <li><h3 class="detailsTitle"><?= $reportagesDetails['con_title'] ?></h3></li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            <li><p class="detailsdate"><?= $reportagesDetails['con_date_start'] ?></p></li>
            <li><p class="detailsdate2">Dernière mise à jour: <?= $reportagesDetails['con_date_end'] ?></p></li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            <li><p class="detailsText"><?= $reportagesDetails['con_description'] ?></p></li>
        </div>
    </div>
</ul>
<a class="btn btn-default" type="button" href="<?= $this->url('reportages_liste') ?>">&lt; Retour</a>
<?php $this->stop('main_content') ?>
