<?php $this->layout('layout', ['title' => 'Reportages!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des reportages</h2>


	<div class="row">
		<div class="col-md-12 text-left">
			<?php foreach ($reportagesListe as $key => $value) : ?>
					<ul class="list-group">
						<li class="list-group-item">
							<a href="<?= $this->url('reportages_add') ?>"><button class="btn btn-default btn-sm" >Ajouter une reportages</button></a>
						</li>
						<li class="list-group-item">
							<a href="<?= $this->url('reportages_reportagesDetails',['id'=>$value['id']]) ?>"><?= $value['con_type'].'<br/> '.$value['con_title'].'<br/> '.$value['con_synopsis']?></a>
						</li>
						<li class="list-group-item">
							<a  href="<?= $this->url('reportages_update', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Modifier</button></a>
							<a  href="<?= $this->url('reportages_deleteConfirmation', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Delete</button></a>
						</li>
					</ul>
			<?php endforeach ?>
		</div>
	</div>	
<?php $this->stop('main_content') ?>
