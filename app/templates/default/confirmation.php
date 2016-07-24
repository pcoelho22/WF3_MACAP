<?php $this->layout('layout', ['title' => 'Confirmation !']) ?>

<?php $this->start('main_content') ?>
<h2>Confirmation !</h2>

<?php if (!empty($newsDetails['contenus_type_id']) && $newsDetails['contenus_type_id'] === '1'): ?>
    <h3>Are you sure you want to remove this News - <?= $newsDetails['con_title'] ?>?</h3>
    <a  href="<?= $this->url('news_liste') ?>"><button class="btn btn-default btn-sm">NO</button></a>
    <a  href="<?= $this->url('news_delete', ['id' => $newsDetails['id']]) ?>"><button class="btn btn-default btn-sm">YES</button></a>

<?php elseif (!empty($eventsDetails['contenus_type_id']) && $eventsDetails['contenus_type_id'] === '3'): ?>
    <h3>Are you sure you want to remove this Event - <?= $eventsDetails['con_title'] ?>?</h3>
    <a  href="<?= $this->url('events_liste') ?>"><button class="btn btn-default btn-sm">NO</button></a>
    <a  href="<?= $this->url('events_delete', ['id' => $eventsDetails['id']]) ?>"><button class="btn btn-default btn-sm">YES</button></a>

<?php elseif (!empty($reportagesDetails['contenus_type_id']) && $reportagesDetails['contenus_type_id'] === '2'): ?>
    <h3>Are you sure you want to remove this Reportage - <?= $reportagesDetails['con_title'] ?>?</h3>
    <a  href="<?= $this->url('reportages_liste') ?>"><button class="btn btn-default btn-sm">NO</button></a>
    <a  href="<?= $this->url('reportages_delete', ['id' => $reportagesDetails['id']]) ?>"><button class="btn btn-default btn-sm">YES</button></a>

<?php elseif (!empty($galerieDetails['id'])): ?>
    <h3>Are you sure you want to remove this Galerie - <?= $galerieDetails['gal_name'] ?>?</h3>
    <a  href="<?= $this->url('galerie_liste') ?>"><button class="btn btn-default btn-sm">NO</button></a>
    <a  href="<?= $this->url('galerie_delete', ['id' => $galerieDetails['id']]) ?>"><button class="btn btn-default btn-sm">YES</button></a>

<?php endif; ?>

<?php $this->stop('main_content') ?>
