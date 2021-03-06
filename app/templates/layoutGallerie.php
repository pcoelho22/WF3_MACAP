<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $this->e($title) ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Concours de voitures de collection pour une oeuvre caritative">
        <meta name="keywords" content="concours, voiture de collection, oldtimer, classic cars, charity, make a wish, Luxembourg" />

        <!-- Open Graph data -->
        <!-- http://ogp.me/ -->
        <meta property="og:title" content="Concours d'elegance & Luxembourg Classic Days" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.concours-mondorf.lu/" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:description" content="Concours de voitures de collection pour une oeuvre caritative" />
        <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">

        <link rel="stylesheet" href="<?= $this->assetUrl('lib/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('lib/css/bootstrap-theme.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-image-gallery.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styleCorr.css')?>">

    </head>
    <body>
        <header>
            <div class="container">
                <div class="row"> 
                    <div class="col-sm-4 text-left">
                        <ul class="list-inline no-margin-top small">
                            <li><a href="http://www.gdc.lu/" target="_blank"><img alt="" src="<?= $this->assetUrl('img/GDCI_logo.jpg') ?>" class="img-responsive"></a></li>
                            <li><a href="http://www.fiva.org/newsite/" target="_blank"><img alt="" src="<?= $this->assetUrl('img/FIVA_logo.png') ?>" class="img-responsive"></a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 text-center">                
                        <a id="mainLogo" class="logo">
                            <img alt="image" src="<?= $this->assetUrl('img/MondorfLogoLast.jpg') ?>" class="img-responsive"></a>     
                    </div>

                    <div class="col-md-4 text-right">
                        <?php if (!isset($_SESSION['user'])): ?>
                            <ul class="list-inline no-margin-top small">

                                <li><a class="btn btn-default btn-sm" href="<?= $this->url('user_signup') ?>"><span class="fa fa-user" aria-hidden="true"></span> Enregistrement</a>
                                </li>

                                <li class="no-margin-top small">                
                                    <a class="btn btn-default btn-sm" href="<?= $this->url('user_login') ?>"><span class="fa fa-sign-in" aria-hidden="true"></span> Login</a>
                                </li>
                            </ul>
                        <?php else: ?>
                            <div class="no-margin-top small">
                                <ul class="list-inline no-margin-top small">

                                    <li>
                                        <h4><img alt="image" src="<?= $this->assetUrl('img/avatar.png') ?>" alt="avatar" width="30px" height="32px"> <?= $_SESSION['user']['use_userName'] ?></h4>
                                    </li>
                                    <?php if($_SESSION['user']['use_role_opt1'] === '2'): ?>
                                    <li>
                                        <a class="btn btn-success btn-sm" href="<?= $this->url('admin_home') ?>"><span class="fa fa-cog fa-fw" aria-hidden="true"></span>Menu administrateur</a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="no-margin-top">
                                        <a class="btn btn-default btn-sm" href="<?= $this->url('user_logout') ?>"><span class="fa fa-power-off fa-fw" aria-hidden="true"></span> Se déconnecter</a>   
                                    <li>
                                        <a class="btn btn-default btn-sm" href="<?= $this->url('user_edit') ?>"><span class="fa fa-pencil fa-fw" aria-hidden="true"></span> Editer votre profil</a>
                                    </li>
                                    <?php if(isset($_SESSION['roles'])): ?>
                                        <?php if (in_array('3', $_SESSION['roles'])): ?>
                                    <li>
                                        <a class="btn btn-default btn-sm" href="<?= $this->url('participant_edit') ?>">editer votre profil de participant</a>
                                    </li>
                                <?php endif; ?>
                                    <?php if (in_array('4', $_SESSION['roles'])): ?>
                                    <li>
                                        <a class="btn btn-default btn-sm" href="<?= $this->url('exposant_edit') ?>">editer votre profil d'exposant</a>
                                    </li>
                                <?php endif; ?>
                                    <?php if (in_array('5', $_SESSION['roles'])): ?>
                                    <li>
                                        <a class="btn btn-default btn-sm" href="<?= $this->url('sponsor_edit') ?>">editer votre profil de sponsor</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                                </ul>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="visible-xs">
                            <strong><a class="navbar-brand" href="<?= $this->url('home') ?>">concours-mondorf.lu</a></strong>
                        </div>  
                    </div>

                    <div class="collapse navbar-collapse" id="centerednav">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= $this->url('home') ?>">HOME</a></li>
                            <li><a href="<?= $this->url('events_liste') ?>">EVENTS</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MEDIA<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= $this->url('news_liste') ?>">NEWS</a></li>
                                    <li><a href="<?= $this->url('reportages_liste') ?>">REPORTAGES</a></li>
                                    <li><a href="<?= $this->url('magazine_liste') ?>">MAGAZINE</a></li>
                                </ul>                 
                            </li>          
                            <li><a href="<?= $this->url('sponsor_liste') ?>">SPONSORS</a></li>
                            <li><a href="<?= $this->url('galerie_liste') ?>">GALERIE</a></li>
                            <li><a href="<?= $this->url('default_shop') ?>">SHOP</a></li>
                            <li><a href="<?= $this->url('default_charite') ?>">CHARITÉ</a></li>
                            <li><a href="<?= $this->url('default_aboutus') ?>">ABOUT US</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div> <!-- /.container --> 
            </div>
        </header>

        <div class="container">
            <?= $this->section('main_content') ?>
        </div>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div id="contactUs" class="col-sm-4 text-center">
                        <br>
                        <ul class="list-inline small">
                            <li><a class="btn btn-default btn-sm" href="<?= $this->url('default_contact') ?>"><span class="fa fa-phone" aria-hidden="true"></span> Nous contacter</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="set squared icon-inflate">
                            <a href="http://www.facebook.com/concoursMondorf" target="_blank" class="social facebook">Facebook</a>
                            <a href="https://twitter.com/GD_Luxembourg" target="_blank" class="social twitter">Twitter</a>
                            <a href="https://plus.google.com/explore" target="_blank" class="social google-plus">Google+</a>
                            <a href="https://www.instagram.com/" target="_blank" class="social instagram">Instagram</a>
                            <a href="https://www.youtube.com/" target="_blank" class="social youtube">Youtube</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <ul class="list-inline small">
                            <li><a href="http://www.make-a-wish.lu/" target="_blank"><img src="<?= $this->assetUrl('img/MAW.jpg') ?>" class="img-responsive"></a></li>
                        </ul>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-12 text-center">
                        <ul class="list-inline no-margin-bottom small">
                            <li><a href="<?= $this->url('default_termsandconditions') ?>" class="small" target="self">Terms &amp; Conditions</a></li>
                            <li><a href="<?= $this->url('default_sitemap') ?>" class="small" target="self">Site Map</a></li>
                        </ul>
                        <a href="http://www.mc-app.eu" class="small" target="self">© Designed by McAPP 2016</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Button scroll to top -->
        <div id='goTop'></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>
        <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="<?= $this->assetUrl('js/bootstrap-image-gallery.min.js')?>"></script>
        
    </body>
</html>