<?php $this->layout('layout', ['title' => 'Events Details  !']) ?>

<?php $this->start('main_content') ?>
<h2>Event details</h2>
<ul><br/>
    <div class="row">
        <div class="col-md-3 text-left">
            <li><img class="avatar" src="<?= $this->assetUrl($eventsId['con_avatar']) ?>"></li>
        </div>
        <div class="col-md-8 text-left">
            <li><h3 class="detailsTitle"><?= $eventsId['con_title'] ?></h3></li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            <li><p class="detailsdate">Event Start: <?= $eventsId['con_date_start'] ?></p></li>
            <li><p class="detailsdate2">Event End: <?= $eventsId['con_date_end'] ?></p></li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            <li><p class="detailsText"><?= $eventsId['con_description'] ?></p></li>
        </div>
    </div>
</ul>
<h2>Liste de galeries associé au Event <?= $eventsId['con_title'] ?></h2>
<ul>
    <?php foreach ($eventsIdGaleires as $key => $value) : ?>
        <li><a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a></li><br/>
    <?php endforeach ?>
</ul>

<a class="btn btn-default1" href="<?= $this->url('events_liste') ?>"><strong>&lt</strong> Retour</a>
<?php $this->stop('main_content') ?>