<?php $this->layout('layout', ['title' => 'News!']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des news</h2>
<div class="row">
	<div class="col-md-12 text-left">
		<ul class="list-group">
			<li  class="list-group-item">
				<a class="btn btn-primary btn-sm" href="<?= $this->url('news_add') ?>"><span class="fa fa-pencil-square-o"></span> Ajouter une news</a>
			</li>
		</ul>
		<?php foreach ($newsListe as $key => $value) : ?>
		<ul class="list-group">
			<li  class="list-group-item">
				<img width="120px" heigth="120px" src="<?= $value['con_avatar']?>">
				<div class="detailsTitleevents"><?= $value['con_title']?>
			</li>
			<li class="list-group-item">
				<a href="<?= $this->url('news_newsDetails',['id'=>$value['id']]) ?>"><?= $value['con_type'].'<br/> '.$value['con_title'].'<br/> '.$value['con_synopsis']?></a>
			</li>
			<li class="list-group-item">
				<a  class="btn btn-primary btn-sm" href="<?= $this->url('news_update', ['id'=>$value['id']]) ?>"><span class="fa fa-pencil fa-fw"></span> Editer</a>
				<a class="btn btn-danger btn-sm" href="<?= $this->url('news_deleteConfirmation', ['id'=>$value['id']]) ?>"><span class="fa fa-trash-o fa-fw"></span> Supprimer</a>
			</li>
		</ul>
	<?php endforeach ?>
	</div>
</div>
<?php $this->stop('main_content') ?>
