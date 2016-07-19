<?php $this->layout('layout', ['title' => 'Reportages!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des reportages</h2>
	<ul><br/>
		<a href="<?= $this->url('reportages_add') ?>"><button>Ajouter une reportages</button></a><br/><br/>
		<?php foreach ($reportagesListe as $key => $value) : ?>
			<li><a href="<?= $this->url('reportages_reportagesDetails',['id'=>$value['id']]) ?>"><?= $value['con_title'].'<br/> '.$value['con_synopsis']?></a></li><br/>
			<a href="<?= $this->url('reportages_update', ['id'=>$value['id']]) ?>"><button>Modifier</button></a>
			<a href="<?= $this->url('reportages_delete', ['id'=>$value['id']]) ?>"><button>Delete</button></a>

		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
