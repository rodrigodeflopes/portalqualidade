<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/datatables_data_sources',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/pnotify.min',
    '/assets/js/plugins/forms/selects/bootstrap_multiselect',
        
    '/assets/js/pages/components_modals',
    '/assets/js/pages/transfersIndex',
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Histórico de Transferências</span></h4>
                </div>

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a class="btn btn-link btn-float has-text" id="excelLink"><i class="icon-file-excel text-primary"></i> <span>Excel</span></a>
                                <a class="btn btn-link btn-float has-text"><i class="icon-printer2 text-primary"></i> <span>Imprimir</span></a>
                        </div>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-transmission position-left"></i> Histórico de Transferências', array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    
        <!-- Filter -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                        <h5 class="panel-title">Seleção de bloco</h5>
                        <div class="panel-body">
                                <?php echo $this->Form->create('Item'); ?>                                        
                                        <div class="row">
                                                <div class="col-lg-3">
                                                        <div class="form-group">
                                                                <label><span class="text-semibold">Condomínios</label>
                                                                <div class="multi-select-full">
                                                                        <select id="townhouses"></select>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-3">
                                                        <div class="form-group">
                                                                <label><span class="text-semibold">Blocos</label>
                                                                <div class="multi-select-full">
                                                                        <select id="towers"></select>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                <?php echo $this->Form->end(); ?>  
                        </div>
                </div>
        </div>
        <!-- /Filter -->          

        <!-- Ajax sourced data -->
        <div class="panel panel-flat">
                <table id="tableItems" class="table datatable-html">
                        <thead>
                                <tr>
                                    <th>Dispositivo</th>
                                    <th>Bloco</th>
                                    <th>data</th>
                                </tr>
                        </thead>
                </table>
        </div>
        <!-- /ajax sourced data -->        

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->