<?php $this->layout('layout', ['title' => 'Confirmation !']) ?>

<?php $this->start('main_content') ?>
<h2>Confirmation !</h2>
<!-- à continuer -->
<?php 
if (!empty($_POST['contenus_type_id'])) {
    $contenu = intval($_POST['contenus_type_id']);
}   
elseif (!empty($_POST['gal_name'])) {
        $galerie = $_POST['gal_name'];
}

?>

<?php if (!empty($_POST['contenus_type_id'])): ?>
    <h3>Are you sure you want to remove this .....?</h3>
    <button class = "buttonYes" ><a href="delete.php?contenus_type_id=<?= $contenu ?>">YES</a></button>
    <button class = "buttonNon" ><a href="add_edit.php?contenus_type_id=<?= $contenu ?>">NO</a></button>
<?php elseif (!empty($_POST['gal_name'])): ?>
    <h3>Are you sure you want to remove this ....?</h3>
    <button class = "buttonYes" ><a href="delete.php?gal_name=<?= $galerie ?>">YES</a></button>
    <button class = "buttonNon" ><a href="edit_category.php?gal_name=<?= $galerie ?>">NO</a></button>
<?php endif; ?>

<?php $this->stop('main_content') ?>
