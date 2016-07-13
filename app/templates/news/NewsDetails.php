<?php $this->layout('layout', ['title' => 'News Details  !']) ?>

<?php $this->start('main_content') ?>
	<h2>Details</h2>
	<ul><br/>
		<?php foreach ($NewsDetails as $key => $value) : ?>
			<li><?= $value['con_title'].'<br/> '.$value['con_description']?></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>