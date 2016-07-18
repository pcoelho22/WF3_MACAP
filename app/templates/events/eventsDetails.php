<?php $this->layout('layout', ['title' => 'Events Details  !']) ?>

<?php $this->start('main_content') ?>
	<h2>Details</h2>
	<ul><br/>
			<li><?= $eventsId['con_title'].'<br/> '.$eventsId['con_description'].'<br/> '.$eventsId['con_dateStart'].' au '.$eventsId['con_dateEnd']?></li><br/>
	</ul>
	<h2>Liste de galeries</h2>
	<ul><br/>
		<?php foreach ($eventsIdGaleires as $key => $value) : ?>
			<li><a href="<?= $this->url('galerie_photos',['id'=>$value['id']]) ?>"><?= $value['gal_name'].'<br/> '.$value['gal_legend']?></a></li><br/>
		<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>