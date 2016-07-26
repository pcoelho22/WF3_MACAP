<?php $this->layout('layout', ['title' => "page d'accueil"]) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div id="myCarousel" class="col-sm-12 carousel slide img-responsive" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active img-responsive">
                <img src="<?= $this->assetUrl('img/Slider/pic4.jpg') ?>" class="img-responsive img-rounded" alt="">
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
            <?php foreach ($imageSlider as $key => $photo):
            ?>
            <div class="item img-responsive">
                <img src="<?= $this->assetUrl($photo['pho_path']) ?>" class="img-responsive img-rounded" alt="">
                <div class="carousel-caption">
                    <h3>Retrocar</h3>
                    <p>Classic cars making history</p>
                </div>
            </div>
            <?php endforeach;
            ?>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        </div>

        <!-- Controls -->
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4 text-center">
        <a href="<?= $this->url('news_liste') ?>">
            <div class="caption">
                <img alt="" src="<?= $this->assetUrl('img/pic1.jpg') ?>" class="img-responsive img-rounded" />
                <h3>News</h3>
            </div>
        </a>
    </div>
    <div class="col-md-4 text-center">
        <a href="<?= $this->url('events_liste') ?>">
            <div class="caption">
                <img alt="" src="<?= $this->assetUrl('img/pic2.jpg') ?>" class="img-responsive img-rounded"/>
                <h3>Events</h3>
            </div>
        </a>
    </div>
    <div class="col-md-4 text-center">
        <a href="<?= $this->url('sponsor_liste') ?>">
            <div class="caption">
                <img alt="" src="<?= $this->assetUrl('img/pic3.jpg') ?>" class="img-responsive img-rounded"/>
                <h3>Sponsors</h3>
            </div>
        </a>
    </div>
</div>

<?php $this->stop('main_content') ?>
