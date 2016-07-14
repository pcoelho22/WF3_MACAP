<?php $this->layout('layout', ['title' => 'News Details  !']) ?>

<?php $this->start('main_content') ?>
	<h2>Details</h2>
	<ul><br/>

			<li><?= $newsDetails['con_title'].'<br/> '.$newsDetails['con_description']?></li><br/>
	</ul>
	
<?php $this->stop('main_content') ?>