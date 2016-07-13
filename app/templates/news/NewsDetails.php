<?php $this->layout('layout', ['title' => 'Photos !']) ?>

<?php $this->start('main_content') ?>
	<h2>Photos de chaque galerie</h2>
	<ul><br/>
		<?php foreach ($photosGalerie as $key => $value) : ?>
			<li><?= $value['pho_name'].'<br/> '.$value['pho_legend']?></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
