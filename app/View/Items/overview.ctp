<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/pages/itemsOverview',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/pnotify.min',        
    '/assets/js/pages/components_modals',
    '/assets/js/plugins/forms/selects/bootstrap_select.min',
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Terminalidades</span></h4>
                </div>
                 
                <div class="heading-elements">
                        <?php echo $this->Form->create('Item'); ?>
                                <div class="form-group">
                                        <div class="has-feedback">                                                 
                                                <?php echo $this->Form->input('townhouses_id', array('label' => false, 'class' => 'bootstrap-select')); ?>                                                  
                                        </div>
                                </div>
                        <?php echo $this->Form->end(); ?>  
                </div>
            
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-office position-left"></i> Terminalidades', array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    	<?php echo $this->Session->flash(); ?>     
        
        <!-- Basic thumbnails -->
        <div class="row">
                <?php foreach ($items as $item): ?>
                        <div style="margin-left: 20px;" class="pull-left">
                                <div class="panel panel-flat">
                                        <div class="panel-heading">
                                                <h4><?php echo $item['towerName'] ?></h4>
                                                <div class="heading-elements">
                                                        <ul class="icons-list">
                                                                <li><a data-action="collapse"></a></li>
                                                                <li><a data-action="reload"></a></li>
                                                        </ul>
                                                </div>
                                        </div>

                                        <div class="panel-body">
                                                <table class="table table-striped table-xxs">
                                                        <tbody>
                                                                <tr>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 32, 'name' => '101')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 33, 'name' => '102')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 31, 'name' => 'H1')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 34, 'name' => '103')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 35, 'name' => '104')); ?>
                                                                </tr>
                                                                <tr>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 37, 'name' => '201')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 38, 'name' => '202')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 36, 'name' => 'H2')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 39, 'name' => '203')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 40, 'name' => '204')); ?>
                                                                </tr>
                                                                <tr>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 42, 'name' => '301')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 43, 'name' => '302')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 41, 'name' => 'H3')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 44, 'name' => '303')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 45, 'name' => '304')); ?>
                                                                </tr>
                                                                <tr>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 47, 'name' => '401')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 48, 'name' => '402')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 46, 'name' => 'H4')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 49, 'name' => '403')); ?>
                                                                        <?php echo $this->element('cellOverview', array('item' => $item, 'pointer' => 50, 'name' => '404')); ?>
                                                                </tr>
                                                        </tbody>
                                                </table>
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