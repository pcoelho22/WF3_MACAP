<?php $this->layout('layout', ['title' => 'Events Details  !']) ?>

<?php $this->start('main_content') ?>
	<h2>Details</h2>
	<ul>
		<li><?= $eventsId['con_title'].'<br/> '.$eventsId['con_description'].'<br/> '.$eventsId['con_date_start'].' au '.$eventsId['con_date_end']?></li><br/>
	</ul>
	<h2>Liste de galeries associé au event <?= $eventsId['con_title']?></h2>
	<ul>
	<?php foreach ($eventsIdGaleires as $key => $value) : ?>
		<li><a href="<?= $this->url('galerie_photos',['id'=>$value['id']]) ?>"><?= $value['gal_name'].'<br/> '.$value['gal_legend']?></a></li><br/>
	<?php endforeach ?>
	</ul>
	
<?php $this->stop('main_content') ?>