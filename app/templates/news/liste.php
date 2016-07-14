<?php $this->layout('layout', ['title' => 'News!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des news</h2>
	<ul><br/>
		<a href="<?= $this->url('news_add') ?>"><button>Ajouter une news</button></a><br/><br/>
		<?php foreach ($newsListe as $key => $value) : ?>
			<li><a href="<?= $this->url('news_newsDetails',['id'=>$value['id']]) ?>"><?= $value['con_title'].'<br/> '.$value['con_synopsis']?></a></li><br/>
			<a href="<?= $this->url('news_update', ['id'=>$value['id']]) ?>"><button>Modifier</button></a>
			<a href="<?= $this->url('news_delete', ['id'=>$value['id']]) ?>"><button>Delete</button></a>

		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
