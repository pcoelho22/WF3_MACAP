<?php $this->layout('layout', ['title' => 'Galerie !']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste de galeries</h2>
	<ul><br/>
		<a href="<?= $this->url('galerie_add') ?>"><button>Ajouter une galerie</button></a><br/><br/>
		<?php foreach ($galerieListe as $key => $value) : ?>
			<li><a href="<?= $this->url('galerie_photos',['id'=>$value['id']]) ?>"><?= $value['gal_name'].'<br/>'.$value['gal_legend']?></a></li><br/>
			<a href="<?= $this->url('galerie_update', ['id'=>$value['id']]) ?>"><button>Modifier</button></a>
			<a href="<?= $this->url('galerie_delete', ['id'=>$value['id']]) ?>"><button>Delete</button></a>
		<?php endforeach ?>
	</ul>
		
<?php $this->stop('main_content') ?>
