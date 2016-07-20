<?php $this->layout('layout', ['title' => 'News Details  !']) ?>

<?php $this->start('main_content') ?>
	<h2>Details</h2>
	<ul><br/>
			<li><h3 style="color:blue;"><?= $newsDetails['con_title']?></h3>.'<br/><strong><?=$newsDetails['con_description']?></strong></li><br/>
	</ul>
	<a class="btn btn-default" type="button" href="<?= $this->url('news_liste')?>">&lt; retour</a>
<?php $this->stop('main_content') ?>