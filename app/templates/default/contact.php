<?php $this->layout('layoutContact', ['title' => 'Contact !']) ?>

<?php $this->start('main_content') ?>
<h2>Nous contacter.</h2>
<form action="">
    <input id="adresse" type="text">
    <input id="button" type="button" value="Intinéraire">
</form>
<div id="map" class=""></div>

<?php $this->stop('main_content') ?>
