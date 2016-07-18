<?php $this->layout('layout', ['title' => 'Events !']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste de events</h2>
	<ul><br/>
		<a href="<?= $this->url('events_add') ?>"><button>Ajouter un event</button></a><br/><br/>
		<?php foreach ($eventsListe as $key => $value) : ?>
			<li><a href="<?= $this->url('events_eventsDetails',['id'=>$value['id']]) ?>"><?= $value['con_title'].'<br/>'.$value['con_synopsis']?></a></li><br/>
			<a href="<?= $this->url('events_update', ['id'=>$value['id']]) ?>"><button>Modifier</button></a>
			<a href="<?= $this->url('events_delete', ['id'=>$value['id']]) ?>"><button>Delete</button></a>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
