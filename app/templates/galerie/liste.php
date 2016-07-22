<?php $this->layout('layout', ['title' => 'Galerie !']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste de galeries</h2>
	<div class="row">
		<div class="col-md-12 text-left">
			<?php foreach ($galerieListe as $key => $value) : ?>
					<ul class="list-group">
						<li class="list-group-item">
							<a href="<?= $this->url('galerie_add') ?>"><button class="btn btn-default btn-sm" >Ajouter une reportages</button></a>
						</li>
						<li class="list-group-item">
							<a href="<?= $this->url('galerie_photos',['id'=>$value['id']]) ?>"><?= $value['gal_name'].'<br/> '.$value['gal_legend']?></a>
						</li>
						<li class="list-group-item">
							<a  href="<?= $this->url('galerie_update', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Modifier</button></a>
							<a  href="<?= $this->url('galerie_deleteConfirmation', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Delete</button></a>
						</li>
					</ul>
			<?php endforeach ?>
		</div>
	</div>	
<?php $this->stop('main_content') ?>
