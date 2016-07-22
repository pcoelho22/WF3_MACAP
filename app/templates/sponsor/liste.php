<?php $this->layout('layout', ['title' => 'Sponsors !']) ?>

<?php $this->start('main_content') ?>
<ul>
	<?php foreach ($sponsorListe as $key => $value) : ?>
		<li><a href="<?= $value['spo_url'] ?>" target="_blank"><img src="<?= $this->assetUrl($value['spo_avatar']) ?>"></a></li><br/>
	<?php endforeach ?>
</ul>

<div class="col-md-12">
	<h2>Nos sponsors</h2>
	<p><strong>Le Mondor-les-Bains Concours d'Elegance tient à remercier ses sponsors qui souscrivent généreusement à cet événement. Leur soutien financier important nous permet de maintenir notre engagement envers l'excellence et poursuivre nos efforts au profit de nos oeuvres de bienfaisance.</strong></p>	
</div>
<div class="col-md-12 block-center">
	<div class="col-md-12 text-center">

		<h4 class="background"><span>Premium Sponsors</span></h4>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<a href="http://www.casino2000.lu/" target="_blank"><img src="<?= $this->assetUrl('../sponsor/logo/premium sponsors/Casino.png')?>"></a>
		</div>
		<div class="col-sm-2">
			<a href="http://www.brm-manufacture.com/" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="https://www.degroofpetercam.com/index" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="http://www.autopolis.lu/" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="http://www.rollinger.lu/" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="http://www.gdc.lu/" target="_blank"><img src=""></a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<a href="" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="" target="_blank"><img src=""></a>
		</div>
		<div class="col-sm-2">
			<a href="" target="_blank"><img src=""></a>
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
