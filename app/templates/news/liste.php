<?php $this->layout('layout', ['title' => 'News!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des news</h2>
	<ul><br/>
		<?php foreach ($newsListe as $key => $value) : ?>
			<li><a href="<?= $this->url('news_newsDetails',['id'=>$value['id']]) ?>"><?= $value['con_title'].'<br/> '.$value['con_synopsis']?></a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>
