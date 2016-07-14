<?php $this->layout('layout', ['title' => 'Photos !']) ?>

<?php $this->start('main_content') ?>
	<h2>Photos de chaque galerie</h2>
	<ul><br/><img src="">
		<?php foreach ($photosGalerie as $key => $value) : ?>
			<li><?= $value['pho_legend'].'<br/> '.$value['pho_name']?><br/><img src="<?= $this->assetUrl($value['pho_path'])?>"></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
