<?php $this->layout('layout', ['title' => 'Reportages detailes !']) ?>

<?php $this->start('main_content') ?>
	<h2>Reportage details</h2>
	<ul><br/>
		<li><h3><?= $reportagesDetails['con_title']?></h3>.'<br/>.<?= $reportagesDetails['con_description']?></li><br/>
	
	</ul>
	<a class="btn btn-default" type="button" href="<?= $this->url('reportages_liste')?>">&lt; retour</a>
<?php $this->stop('main_content') ?>
