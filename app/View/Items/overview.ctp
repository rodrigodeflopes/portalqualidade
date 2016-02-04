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
                        <div style="margin-left: 20px; width: 360px;" class="pull-left">
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

                                        <?php if($item['towerName'] !== 'AC'){ ?>
                                    
                                                <div class="panel-body">
                                                        <!--  element(array, key, keyName, pointer, name)  -->
                                                        <table class="table table-xxs table-columned">
                                                                <tbody>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 0, 'name' => 'FACHADA', 'attribute' => 'colspan="6"')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 8, 'name' => 'TELHADO', 'attribute' => 'colspan="6"')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 6, 'name' => 'PLATIBANDA', 'attribute' => 'colspan="6"')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 55, 'name' => 'E4', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 47, 'name' => '401', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 48, 'name' => '402', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 46, 'name' => 'H4', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 49, 'name' => '403', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 50, 'name' => '404', 'attribute' => '')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 54, 'name' => 'E3', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 42, 'name' => '301', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 43, 'name' => '302', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 41, 'name' => 'H3', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 44, 'name' => '303', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 45, 'name' => '304', 'attribute' => '')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 53, 'name' => 'E2', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 37, 'name' => '201', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 38, 'name' => '202', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 36, 'name' => 'H2', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 39, 'name' => '203', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 40, 'name' => '204', 'attribute' => '')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 52, 'name' => 'E1', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 32, 'name' => '101', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 33, 'name' => '102', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 31, 'name' => 'H1', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 34, 'name' => '103', 'attribute' => '')); ?>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item', 'keyName' => 'Location2', 'pointer' => 35, 'name' => '104', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 1, 'name' => 'RADIER', 'attribute' => 'colspan="6"')); ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 7, 'name' => 'FUNDAÇÃO', 'attribute' => 'colspan="6"')); ?>
                                                                        </tr>
                                                                </tbody>
                                                        </table>
                                                </div>
                                        <?php }else{ ?>
                                    
                                                <div class="panel-body">
                                                        <!--  element(array, key, keyName, pointer, name)  -->
                                                        <table class="table table-striped table-xxs table-columned">
                                                                <tbody>
                                                                        <tr>
                                                                            <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 0, 'name' => 'GUARITA', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                        <tr>
                                                                            <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 1, 'name' => 'LIXEIRA', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                        <tr>
                                                                            <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 2, 'name' => 'C. COMUNITÁRIO', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                        <tr>
                                                                            <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 3, 'name' => 'RESERVATÓRIO', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                        <tr>
                                                                            <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 4, 'name' => 'INFRA INTERNA', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                        <tr>
                                                                            <?php echo $this->element('cellOverview', array('array' => $item, 'key' => 'Item2', 'keyName' => 'Location1', 'pointer' => 5, 'name' => 'INFRA EXTERNA', 'attribute' => '')); ?>
                                                                        </tr>  
                                                                </tbody>
                                                        </table>
                                                </div>
                                        <?php } ?>
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


<style>
            .verticalText
            {
                text-align: center;
                vertical-align: middle;
                width: 0px;
                white-space: nowrap;
                -webkit-transform: rotate(-90deg); 
                -moz-transform: rotate(-90deg);                 
            };
</style>
