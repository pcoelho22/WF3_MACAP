<?php $this->layout('layout', ['title' => 'Sponsors !']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste de sponsors</h2>
	<ul><br/>
		<?php foreach ($sponsorListe as $key => $value) : ?>
			<li><?= $value['spo_name_sponsors'].'<br/> '.$value['spo_first_name_in_charge'].'<br/> '.$value['spo_avatar']?></li><br/>
		<?php endforeach ?>
	</ul>
		
<?php $this->stop('main_content') ?>
