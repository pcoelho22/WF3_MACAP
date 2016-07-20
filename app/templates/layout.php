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

        <link rel="stylesheet" href="<?= $this->assetUrl('lib/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('lib/css/bootstrap-theme.min.css')?>">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        <!--<?php debug($_SESSION); ?>-->
        <header>
            <div class="container">
                <div class="row"> 
                    <div class="col-sm-4 text-left">
                        <ul class="list-inline no-margin-top small">
                            <li><a href="http://www.gdc.lu/" target="_blank"><img src="<?= $this->assetUrl('img/GDCI_logo.jpg')?>" class="img-responsive"></a></li>
                            <li><a href="http://www.fiva.org/newsite/" target="_blank"><img src="<?= $this->assetUrl('img/FIVA_logo.png')?>" class="img-responsive"></a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 text-center">                
                        <a id="mainLogo" class="logo">
                          <img src="<?= $this->assetUrl('img/MondorfLogoLast.jpg')?>" class="img-responsive"></a>     
                    </div>
                                
                    <div class="col-md-4 text-right">
                        <ul class="list-inline no-margin-top small">

                            <li><a href="#" class="link-internal white small dropdown-toogle" data-toggle="dropdown"><button type="button" class="btn btn-default btn-sm"><span class="fa fa-user" aria-hidden="true"></span> Register</button></a>      
                            </li>

                            <li class="no-margin-top small">                
                                <a href="#" class="link-internal white small dropdown-toogle" data-toggle="dropdown"><button type="button" class="btn btn-default btn-sm"><span class="fa fa-sign-in" aria-hidden="true"></span> Login</button></a>
                                <div class="dropdown-menu containerlog">
                                <h1>Login</h1>
                                    <form action="#" method="POST" role="form">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            <input id="use_userName" type="text" placeholder="pseudo/email" name="user[username]" class="form-control text-left">
                                        </div>
                                        <span class="help-block"></span>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                                            <input id="use_password" type="password" placeholder="password" class="form-control text-left">
                                        </div>
                                        <span class="help-block"></span>
                                        <button class="btn btn-primary btn-block btn-md" type="submit">Login</button>                                   
                                        <div>
                                            <span class="help-block"></span>
                                            <p>
                                            <a href="#">Forgot password?</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
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
                            <strong><a class="navbar-brand" href="#">concours-mondorf.lu</a></strong>
                        </div>  
                    </div>

                    <div class="collapse navbar-collapse" id="centerednav">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= $this->url('home')?>">HOME</a></li>
                            <li><a href="<?= $this->url('events_liste')?>">EVENTS</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MEDIA<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= $this->url('news_liste')?>">NEWS</a></li>
                                    <li><a href="<?= $this->url('reportages_liste')?>">REPORTAGES</a></li>
                                    <li><a href="<?= $this->url('magazine_liste')?>">MAGAZINE</a></li>
                                </ul>                 
                            </li>          
                            <li><a href="<?= $this->url('sponsor_liste')?>">SPONSORS</a></li>
                            <li><a href="<?= $this->url('galerie_liste')?>">GALERIE</a></li>
                            <li><a href="#">SHOP</a></li>
                            <li><a href="#">CHARITÉ</a></li>
                            <li><a href="#">ABOUT US</a></li>
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
                    <div class="col-sm-4 text-center">
                    <br>
                       <ul class="list-inline small">
                            <li><a href="" class="link-internal grey small"><button type="button" class="btn btn-default btn-sm"><span class="fa fa-home" aria-hidden="true"></span> Home</button></a></li>                
                        </ul>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="set squared icon-inflate">
                            <a href="https://fr-fr.facebook.com/" target="_blank" class="social facebook">Facebook</a>
                            <a href="https://twitter.com/?lang=fr" target="_blank" class="social twitter">Twitter</a>
                            <a href="https://plus.google.com/explore" target="_blank" class="social google-plus">Google+</a>
                            <a href="https://fr.pinterest.com/" target="_blank" class="social pinterest">Pinterest</a>
                            <a href="https://www.instagram.com/" target="_blank" class="social instagram">Instagram</a>
                            <a href="https://www.linkedin.com/" target="_blank" class="social linked-in">LinkedIn</a>
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
                            <li><a href="/contact us" class="small" target="_blank">Contact Us</a></li>
                            <li><a href="/terms-conditions" class="small" target="self">Terms &amp; Conditions</a></li>
                            <li><a href="/en/sitemap" class="small" target="self">Site Map</a></li>
                        </ul>               
                        <small><a href="http://www.mc-app.eu" class="small" target="self">© McAPP 2016</a></small>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>