<?php $this->layout('layout', ['title' => 'News!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des news</h2>
	<ul><br/>
		<?php foreach ($newsListe as $key => $value) : ?>
			<li><a href="<?= $this->url('news_details',['id'=>$value['id']]) ?>"><?= $value['gal_name'].'<br/> '.$value['gal_legend']?></a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
