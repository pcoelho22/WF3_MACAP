<?php $this->layout('layout', ['title' => 'News Details  !']) ?>

<?php $this->start('main_content') ?>
	<h2>Details</h2>
	<ul><br/>
	<!-- à revoir le lien vers l'avatar -->
			<li><h3 class="detailsTitle"><img src="<?= $newsDetails['con_avatar']?>"><br/><?= $newsDetails['con_title']?></h3>.'<br/><p class="detailsText"><?=$newsDetails['con_description']?></p></li><br/>
	</ul>
	<a class="btn btn-default1" type="button" href="<?= $this->url('news_liste')?>"><strong>&lt</strong> retour</a>
<?php $this->stop('main_content') ?>