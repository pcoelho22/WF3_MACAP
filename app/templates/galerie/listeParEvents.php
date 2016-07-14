<?php $this->layout('layout', ['title' => 'Galerie par event !']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste de galeries par events</h2>
	<ul><br/>
		<?php foreach ($eventsGalerieListe as $key => $value) : ?>
			<li><a href="<?= $this->url('galerie_photos',['id'=>$value['id']]) ?>"><?= $value['gal_name'].'<br/> '.$value['gal_legend']?></a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
