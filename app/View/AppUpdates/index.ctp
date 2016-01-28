<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/ui/prism.min',
    '/assets/js/pages/sidebar_detached_sticky_native'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Updates</span></h4>
                </div>

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a href="appUpdates/add" class="btn btn-link btn-float has-text"><i class="icon-add text-primary"></i><span>Adicionar</span></a>
                        </div>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-width position-left"></i> Updates', array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <?php echo $this->Session->flash(); ?> 
        <div class="row">
                <div class="col-lg-9">
                        <!-- Detached content -->
                        <div class="container-detached">
                                <div class="content-detached">
                                        <?php foreach ($appUpdates as $appUpdate): ?>
                                                <!-- Version -->
                                                <div class="panel panel-flat" id="id<?php echo $appUpdate['AppUpdate']['id']; ?>">
                                                        <div class="panel-heading">
                                                                <?php echo $this->Html->link('<h5 class="panel-title">Versão ' . $appUpdate['AppUpdate']['name'] . '</h5>', array('action' => 'view', $appUpdate['AppUpdate']['id']), array('escape' => false)); ?>
                                                                <div class="heading-elements">
                                                                        <span class="text-muted heading-text"><?php echo h($this->Time->format('d/m/Y', $appUpdate['AppUpdate']['created'])); ?></span>
                                                                        <span class="<?php echo $appUpdate['AppUpdateStatus']['cssClass']; ?> heading-text" heading-text"><?php echo $appUpdate['AppUpdateStatus']['name']; ?></span>
                                                                </div>
                                                        </div>

                                                        <div class="panel-body">
                                                                <p class="content-group"><?php echo h($appUpdate['AppUpdate']['description']); ?></p>
                                                        </div>
                                                </div>
                                                <!-- /version -->
                                        <?php endforeach; ?>
                                </div>
                        </div>
                        <!-- /detached content -->
                </div>
                <div class="col-lg-3">
                        <!-- Detached sidebar -->
                        <div class="sidebar-detached">
                                <div class="sidebar sidebar-default">
                                        <div class="sidebar-content">

                                                <!-- Support -->
                                                <div class="sidebar-category no-margin">
                                                        <div class="category-title">
                                                                <span>Changelog</span>
                                                                <i class="icon-menu7 pull-right"></i>
                                                        </div>
                                                </div>
                                                <!-- /support -->


                                                <!-- Navigation -->
                                                <div class="sidebar-category">
                                                        <div class="category-content no-padding">
                                                                <ul class="nav navigation">
                                                                        <?php foreach ($appUpdates as $appUpdate): ?>
                                                                                <li><a href="#id<?php echo $appUpdate['AppUpdate']['id']; ?>">Versão <?php echo $appUpdate['AppUpdate']['name']; ?> <span class="text-muted text-regular pull-right"><?php echo h($this->Time->format('d/m/Y', $appUpdate['AppUpdate']['created'])); ?></span></a></li>
                                                                        <?php endforeach; ?>
                                                                </ul>
                                                        </div>
                                                </div>
                                                <!-- /navigation -->
                                        </div>
                                </div>
                        </div>
                        <!-- /detached sidebar -->
                </div>
        </div>

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->