<?php $this->layout('layout', ['title' => 'Magazine']) ?>
<?php $this->start('main_content') ?>
	<h2>Liste des magazines disponible</h2>
	<div class="row">
		<div class="col-md-12 text-left">
			<?php foreach ($magazineListe as $key => $value) : ?>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?= $this->url('magazine_add') ?>"><button class="btn btn-default btn-sm" >Ajouter un magazine</button></a>
					</li>
					<li class="list-group-item">
						<img width="300" height="400px" src="<?= $this->assetUrl($value['mag_couverture'])?>">
					</li>
					<li  class="list-group-item">
						<a href="<?= $this->assetUrl($value['mag_path'])?>"><?= $value['mag_name'].'<br/> '.$value['mag_date']?></a>
					</li>
					<li class="list-group-item">
						<a  href="<?= $this->url('magazine_update', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Modifier</button></a>
						<a  href="<?= $this->url('magazine_delete', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Delete</button></a>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
	</div>
<?php $this->stop('main_content') ?>