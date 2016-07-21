<?php $this->layout('layout', ['title' => 'News!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des news</h2>
	<div class="row">
		<div class="col-md-12 text-left">
			<?php foreach ($newsListe as $key => $value) : ?>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?= $this->url('news_add') ?>"><button class="btn btn-default btn-sm" >Ajouter une news</button></a>
					</li>
					<li  class="list-group-item">
						<a href="<?= $this->url('news_newsDetails',['id'=>$value['id']]) ?>"><?= $value['con_type'].'<br/> '.$value['con_title'].'<br/> '.$value['con_synopsis']?></a>
					</li>
					<li class="list-group-item">
						<a  href="<?= $this->url('news_update', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Modifier</button></a>
						<a  href="<?= $this->url('news_delete', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Delete</button></a>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
	</div>
<?php $this->stop('main_content') ?>
