<?php $this->layout('layout', ['title' => 'Magazine']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des magazines disponible</h2>
	<ul><br/>
		<?php foreach ($magazineListe as $key => $value) : ?>
			<li><a href="<?= $this->assetUrl($value['mag_path'])?>"><?= $value['mag_name'].'<br/> '.$value['mag_date']?><img src="<?= $this->assetUrl($value['mag_couverture'])?>"></a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>