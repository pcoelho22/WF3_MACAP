<?php $this->layout('layout', ['title' => 'Reportages !']) ?>

<?php $this->start('main_content') ?>
	<h2>Reportages</h2>
	<ul><br/>
		<?php foreach ($reportageListe as $key => $value) : ?>
			<li><?= $value['contenus_name'].'<br/> '.$value['contenus_legend']?></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
