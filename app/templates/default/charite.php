<?php $this->layout('layout', ['title' => "Charité"]) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div class="col-sm-12">
        <a href="http://www.make-a-wish.lu/" target="_blank"><img src="<?= $this->assetUrl('img/MAWBIG.jpg') ?>" class="center-block" alt="image" ></a>
    </div>
</div>

<div class="row" style="margin-bottom: 35px">
    <div class="col-sm-6 col-sm-offset-3 text-center"><h2>Nous exauçons les voeux d'enfants atteints de maladies graves</h2></div>
    <h2 class="col-sm-4 col-sm-offset-4 text-center"><strong>Faites un don!</strong></h2>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="col-sm-4 text-center">
                <p><strong>Make-A-Wish&reg; Luxembourg Asbl</strong><br/>2 - 4, rue du Château d'Eau<br/>L - 3346 LEUDELANGE</p>
                <p><strong>Adresse visiteurs:</strong><br/>Business Center Strassen<br/>30, rue de l'industrie<br/>L - 8068 STRASSEN<br/>Luxembourg</p>
            </div>
            <div class="col-sm-4 text-center">
                <p><strong>Téléphone et E-Mail:</strong><br/>+352-314.595 <br/> <a href="mailto:info@make-a-wish.lu">info@make-a-wish.lu</a></p>
                <p><strong>Internet et Facebook:</strong><br/><a href="http://www.make-a-wish.lu">www.make-a-wish.lu</a><br/><a href="http://www.facebook.com/makeawishluxembourg"><span class="fa fa-facebook-square fa-2x" aria-hidden="true"></span>/makeawishluxembourg</a></p>
                <p><strong>Copyright 2013</strong><br/>Make-A-Wish&reg; Luxembourg Asbl</p>
            </div>
            <div class="col-sm-4 text-center">
                <p><strong>Banque:</strong><br/>Spuerkees<br/>
                    <strong>BIC:</strong><br/>BCEELULL<br/>
                    <strong>IBAN:</strong><br/>LU20-0019-3755-7632-7000<br/>
                    <strong>Bénéficiaire:</strong><br/>Make-A-Wish&reg; Luxembourg Asbl<br/>
                    <strong>Référence:</strong><br/>Votre nom et adresse</p>
            </div>
        </div>
    </div>
</div>
<?php $this->stop('main_content') ?>
