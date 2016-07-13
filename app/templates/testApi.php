<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
</head>
<body>
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
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSN97AbSZ0KcmYVo5-eOZO2RvuZY6DZzI&callback=initMap">
</script>
<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>
</body>
</html>