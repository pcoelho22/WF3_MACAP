<?php $this->layout('layoutGallerie', ['title' => 'Photos !']) ?>

<?php $this->start('main_content') ?>
<h2>Photos de <?= $eventsIdGaleries['gal_name'] ?></h2>
<?= $eventsIdGaleries['gal_description'] ?>
<div id="links">
	<ul>
	    <?php foreach ($photosGalerie as $key => $value) : ?>
			<li>
				<a href="<?= $this->assetUrl($value['pho_path']) ?>" title="<?= $value['pho_name']?>" data-gallery>
			    	<img id="galpho" class="img-responsive" src="<?= $this->assetUrl($value['pho_path']) ?>" alt>
			    </a>
			</li>
	    <?php endforeach ?>
	</ul>
</div>
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
	<?php $this->stop('main_content') ?>
