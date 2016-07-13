<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
</head>
<body>
	
	<nav>
		<ul>
			<li><a href="<?= $this->url('home') ?>">HOME</a></li>
			<li><a href="#">MEDIA</a>
				<ul>
					<li><a href="">NEWS</a></li>
					<li><a href="">REPORTAGES</a></li>
					<li><a href="">MAGAZINE</a></li>
				</ul>
			</li>	                
			<li><a href="<?= $this->url('events_liste') ?>">EVENTS</a></li>         
			<li><a href="<?= $this->url('galerie_liste') ?>">GALERIE</a></li>	
			<li><a href="#">CHARITE</a></li>	                
			<li><a href="#">SPONSORS</a></li>	                
			<li><a href="#">SHOP</a></li>
			<li><a href="#">ABOUT US</a></li>	                
		</ul>
	</nav>
		
	<div class="container">
		<header>
			<h1>MAKE A WHISH <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>