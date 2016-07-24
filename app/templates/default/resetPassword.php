<?php $this->layout('layout', ['title' => 'Password reset']) ?>

<?php $this->start('main_content') ?>
<h2>Changer de mot de passe</h2>

<form action="" method="post">
    <label for="password">Password</label><br/>
    <input type="password" name="password" value="" required><br/><br/>

    <label for="passwordVal">Re-Entrer le Password</label><br/>
    <input type="password" name="passwordVal" value="" required><br/><br/>

    <input type="submit" value="Changer de mot de passe">
</form>
<?php
if (isset($error)) {
    foreach ($error as $value) {
        echo $value;
    }
}
?>
<?php $this->stop('main_content') ?>
