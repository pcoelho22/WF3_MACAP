<?php $this->layout('layout', ['title' => 'Reportages!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des reportages</h2>
	<ul><br/>
		<?php foreach ($reportageListe as $key => $value) : ?>
			<li><a href="<?= $this->url('reportage_details',['id'=>$value['id']]) ?>"><?= $value['contenus_type_name'].'<br/> '</a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
