<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/switchery.min',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/media/fancybox.min',
    '/assets/js/pages/components_thumbnails'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Obras</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> Obras</a></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <?php echo $this->Session->flash(); ?>
        <!-- Basic thumbnails -->
        <h6 class="content-group text-semibold">
                Obras ativas
                <small class="display-block">Atualmente existem X obras disponíveis para sua contribuição</small>
        </h6>

        <div class="row">
                <?php foreach ($enterprises as $enterprise): ?>
                        <div class="col-md-4">
                                <div class="panel panel-flat">
                                        <div class="panel-heading">
                                                <h4 class="panel-title"><?php echo $this->Html->link($enterprise['Enterprise']['name'], array('action' => 'view', $enterprise['Enterprise']['id'])); ?></h4>
                                                <div class="heading-elements">
                                                        <ul class="icons-list">
                                                                <li><a data-action="collapse"></a></li>
                                                                <li><a data-action="reload"></a></li>
                                                                <li><a data-action="close"></a></li>
                                                        </ul>
                                                </div>
                                        </div>

                                        <div class="panel-body">
                                                <p>Extend thumb with simple zoomable. The icon is inserted directly in HTML and can be easily changed.</p>

                                                <div class="thumbnail">
                                                        <div class="thumb">
                                                                <a href="<?php echo $enterprise['Enterprise']['image_path']; ?>" data-popup="lightbox">
                                                                        <?php echo $this->Html->image($enterprise['Enterprise']['image_path'], array('style' => 'width: 800px; height:340px')); ?>
                                                                        <span class="zoom-image"><i class="icon-plus2"></i></span>
                                                                </a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                <?php endforeach; ?>    
        </div>
        <!-- /basic thumbnails -->

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->