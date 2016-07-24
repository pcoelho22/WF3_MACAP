<?php $this->layout('layout', ['title' => "page d'accueil"]) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div id="carousel-example-generic" class="col-lg-12 carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?= $this->assetUrl('img/pic4.jpg') ?>" class="img-responsive  img-rounded" alt="">
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
            <div class="item">
                <img src="<?= $this->assetUrl('img/pic5.jpg') ?>" class="img-responsive  img-rounded" alt="">
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
            <div class="item">
                <img src="<?= $this->assetUrl('img/alfa.jpg') ?>" class="img-responsive  img-rounded" alt="">
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
            <div class="item">
                <img src="<?= $this->assetUrl('img/pic6.jpg') ?>" class="img-responsive  img-rounded" alt>
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
            <div class="item">
                <img src="<?= $this->assetUrl('img/pic7.jpg') ?>" class="img-responsive  img-rounded" alt>
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4 text-center">
        <div class="caption">
            <img alt="" src="<?= $this->assetUrl('img/pic1.jpg') ?>" class="img-responsive img-rounded" />
            <a href="<?= $this->url('news_liste') ?>"><h3>News</h3></a>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="caption">
            <img alt="" src="<?= $this->assetUrl('img/pic2.jpg') ?>" class="img-responsive img-rounded"/>
            <a href="<?= $this->url('events_liste') ?>"><h3>Events</h3></a>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="caption">
            <img alt="" src="<?= $this->assetUrl('img/pic3.jpg') ?>" class="img-responsive img-rounded"/>
            <a href="<?= $this->url('sponsor_liste') ?>"><h3>Sponsors</h3></a>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>
