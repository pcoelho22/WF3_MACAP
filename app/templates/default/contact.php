<?php $this->layout('testApi', ['title' => 'Contact !']) ?>

<?php $this->start('main_content') ?>
<h2>Nous contacter.</h2>
<form action="">
    <input id="adresse" type="text">
    <input id="button" type="button" value="Intinéraire">
</form>
<div style="width: 500px; height: 500px;" id="map"></div>

<?php $this->stop('main_content') ?>
