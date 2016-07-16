<?php $this->layout('layout', ['title' => 'Reportages detailes !']) ?>

<?php $this->start('main_content') ?>
	<h2>Reportage detailes</h2>
	<ul><br/>
		<li><?= $reportagesDetails['con_title'].'<br/> '.$reportagesDetails['con_description']?></li><br/>
	</ul>
	
<?php $this->stop('main_content') ?>
