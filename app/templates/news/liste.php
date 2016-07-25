<?php $this->layout('layout', ['title' => 'News!']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des news</h2>
	<div class="row">
		<div class="col-md-12 text-left">
					<ul class="list-group">
						<li  class="list-group-item">
							<a href="<?= $this->url('news_add') ?>"><button class="btn btn-default btn-sm" >Ajouter une news</button></a>
						</li>
					</ul>
			<?php foreach ($newsListe as $key => $value) : ?>
				<ul class="list-group">
					<li  class="list-group-item">
						<img width="120px" heigth="120px" src="<?= $value['con_avatar']?>">
						<div class="detailsTitleevents"><?= $value['con_title']?>
					</li>
					<li class="list-group-item">
						<a href="<?= $this->url('news_newsDetails',['id'=>$value['id']]) ?>"><?= $value['con_type'].'<br/> '.$value['con_title'].'<br/> '.$value['con_synopsis']?></a>
					</li>
					<li class="list-group-item">
						<a  href="<?= $this->url('news_update', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Modifier</button></a>
						<a  href="<?= $this->url('news_deleteConfirmation', ['id'=>$value['id']]) ?>"><button class="btn btn-default btn-sm">Delete</button></a>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
	</div>
<h2>Liste des news</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <?php foreach ($newsListe as $key => $value) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="btn btn-default btn-sm" href="<?= $this->url('news_add') ?>">Ajouter une news</a>
                </li>
                <li  class="list-group-item">
                    <img alt="" width="120" heigth="120" src="<?= $value['con_avatar'] ?>">
                    <div class="detailsTitleevents"><?= $value['con_title'] ?></div>
                </li>
                <li class="list-group-item">
                    <a href="<?= $this->url('news_newsDetails', ['id' => $value['id']]) ?>"><?= $value['con_type'] . '<br/> ' . $value['con_title'] . '<br/> ' . $value['con_synopsis'] ?></a>
                </li>
                <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                    <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                        <li class="list-group-item">
                            <a class="btn btn-default btn-sm" href="<?= $this->url('news_update', ['id' => $value['id']]) ?>">Modifier</a>
                            <a class="btn btn-default btn-sm" href="<?= $this->url('news_deleteConfirmation', ['id' => $value['id']]) ?>">Delete</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        <?php endforeach ?>
    </div>
</div>
<?php $this->stop('main_content') ?>
