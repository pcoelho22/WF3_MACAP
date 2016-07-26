<?php $this->layout('layout', ['title' => 'Photos !']) ?>

<?php $this->start('main_content') ?>
<h2>Photos de <?= $eventsIdGaleries['gal_name'] ?></h2>
<?= $eventsIdGaleries['gal_description'] ?>
<ul><br/>
    <?php foreach ($photosGalerie as $key => $value) : ?>
        <li><?= $value['pho_legend'] . '<br/> ' . $value['pho_name'] ?><br/><img src="<?= $this->assetUrl($value['pho_path']) ?>"></li><br/>
    <?php endforeach ?>
</ul>

<?php $this->stop('main_content') ?>
