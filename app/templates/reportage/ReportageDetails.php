<?php $this->layout('layout', ['title' => 'Reportages !']) ?>

<?php $this->start('main_content') ?>
	<h2>Reportage</h2>
	<ul><br/>
		<?php foreach ($reportageDetails as $key => $value) : ?>
			<li><?= $value['con_title'].'<br/> '.$value['con_description']?></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>