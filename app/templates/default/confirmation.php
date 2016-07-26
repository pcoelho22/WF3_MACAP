<?php $this->layout('layout', ['title' => 'Confirmation !']) ?>

<?php $this->start('main_content') ?>
<div id="attention" class="text-center"> 
    <h2>Confirmation !</h2>
    <?php if (!empty($newsDetails['contenus_type_id']) && $newsDetails['contenus_type_id'] === '1'): ?>
        <h3>Voulez-vous vraiment supprimer cette News - <?= $newsDetails['con_title'] ?>?</h3>
        <a  href="<?= $this->url('news_liste') ?>">
            <button class="btn btn-primary btn-sm"><span class="fa fa-thumbs-o-down fa-fw"></span> NO</button>
        </a>
        <a  href="<?= $this->url('news_delete', ['id' => $newsDetails['id']]) ?>">
            <button class="btn btn-danger btn-sm"><span class="fa fa-thumbs-o-up fa-fw"></span> YES</button>
        </a>

    <?php elseif (!empty($eventsDetails['contenus_type_id']) && $eventsDetails['contenus_type_id'] === '3'): ?>
        <h3>Voulez-vous vraiment supprimer cet Event - <?= $eventsDetails['con_title'] ?>?</h3>
        <a  href="<?= $this->url('events_liste') ?>">
            <button class="btn btn-primary btn-sm"><span class="fa fa-thumbs-o-down fa-fw"></span> NO</button></a>
        <a  href="<?= $this->url('events_delete', ['id' => $eventsDetails['id']]) ?>">
            <button class="btn btn-danger btn-sm"><span class="fa fa-thumbs-o-up fa-fw"></span> YES</button>
        </a>

    <?php elseif (!empty($reportagesDetails['contenus_type_id']) && $reportagesDetails['contenus_type_id'] === '2'): ?>
        <h3>Voulez-vous vraiment supprimer ce Reportage - <?= $reportagesDetails['con_title'] ?>?</h3>
        <a  href="<?= $this->url('reportages_liste') ?>">
            <button class="btn btn-primary btn-sm"><span class="fa fa-thumbs-o-down fa-fw"></span> NO</button></a>
        <a  href="<?= $this->url('reportages_delete', ['id' => $reportagesDetails['id']]) ?>">
            <button class="btn btn-danger btn-sm"><span class="fa fa-thumbs-o-up fa-fw"></span> YES</button>
        </a>

    <?php elseif (!empty($galerieDetails['id'])): ?>
        <h3>Voulez-vous vraiment supprimer cette Galerie - <?= $galerieDetails['gal_name'] ?>?</h3>
        <a  href="<?= $this->url('galerie_liste') ?>">
            <button class="btn btn-primary btn-sm"><span class="fa fa-thumbs-o-down fa-fw"></span> NO</button></a>
        <a  href="<?= $this->url('galerie_delete', ['id' => $galerieDetails['id']]) ?>">
            <button class="btn btn-danger btn-sm"><span class="fa fa-thumbs-o-up fa-fw"></span> YES</button>
        </a>

    <?php elseif (!empty($magazineId['id'])): ?>
        <h3>Voulez-vous vraiment supprimer cette Magazine - <?= $magazineId['mag_name'] ?>?</h3>
        <a  href="<?= $this->url('magazine_liste') ?>">
            <button class="btn btn-primary btn-sm"><span class="fa fa-thumbs-o-down fa-fw"></span> NO</button></a>
        <a  href="<?= $this->url('magazine_delete', ['id' => $magazineId['id']]) ?>">
            <button class="btn btn-danger btn-sm"><span class="fa fa-thumbs-o-up fa-fw"></span> YES</button>
        </a>


    <?php endif; ?>
    <span class="help-block"></span>
    <img src="<?= $this->assetUrl('img/Attention.jpg') ?>">
</div>
<?php $this->stop('main_content') ?>
