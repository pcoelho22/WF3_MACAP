<?php $this->layout('layout', ['title' => 'Events !']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste de events</h2>
	<ul><br/>
		<?php foreach ($eventsListe as $key => $value) : ?>
			<li><a href="#"><?= $value['con_type'].'<br/> '.$value['con_title']?></a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
