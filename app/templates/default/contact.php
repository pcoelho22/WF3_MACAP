<?php $this->layout('layoutContact', ['title' => 'Contact !']) ?>

<?php $this->start('main_content') ?>
<h2>Nous trouver</h2>
<div class="row">
    <div class="col-md-4 text-center">
        <span class="help-block"></span>
        <div id="mapStatic" class="center-block thumbnail"></div>
    </div>
    <div class="col-sm-4 text-center">
    <span class="help-block"></span>
        <form action="" method="POST" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                <input id="address" type="text" name="address" placeholder="Votre adresse" class="form-control text-left">
            </div>
        </form>
        <span class="help-block"></span>
        <button class="btn btn-primary btn-sm active" type="button" id="button"><i class="fa fa-location-arrow"></i> Générer votre initnéraire</button>
    </div>
    <div class="col-md-4 text-center">
        <span class="help-block"></span>
        <div id="map" class="center-block thumbnail"></div>
    </div>
</div>
<span class="help-block"></span>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="col-sm-4 text-center">
                <p><strong>MAW Events SARL</strong><br/>30, rue de l'Industrie<br/>L - 8069 STRASSEN<br/>Tel: 00352 314 595<br/>Fax: 00352 314 596</p>
            </div>

            <div class="col-sm-4 text-center">
                <p><a href="mailto: info@concours-mondorf.lu">info@concours-mondorf.lu</a></p>
                <p><a href="http://www.concours-mondorf.lu">www.concours-mondorf.lu</a></p>
                <p><a href="http://www.facebook.com/concoursMondorf"><span class="fa fa-facebook-square fa-2x" aria-hidden="true"></span>/concoursMondorf</a></p>
            </div>

            <div class="col-sm-4 text-center">
                <p><strong>Gentlement Drivers Club ASBL</strong><br/>30, rue de l'Industrie<br/>L - 8069 STRASSEN<br/>Tel: 00352-621-245.274<br/>Email:
                    <a href="mailto: info@gdc.lu">info@gdc.lu</a></p>
            </div>
        </div>
    </div>
</div>
<?php $this->stop('main_content') ?>
