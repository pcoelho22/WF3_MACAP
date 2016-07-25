<?php $this->layout('layout', ['title' => 'Carte du site']) ?>

<?php $this->start('main_content') ?>
<h2>Carte du site</h2>
<div class="row">
    <div class="col-sm-12">
    	<img class="img-responsive center-block" src="<?= $this->assetUrl('img/plan_site_web.jpg') ?>" alt="">
	</div>
</div>
<?php $this->stop('main_content') ?>
