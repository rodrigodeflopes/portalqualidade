<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/datatables_data_sources',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/pnotify.min',
    '/assets/js/plugins/forms/selects/bootstrap_multiselect',
    
    'assets/js/pages/form_checkboxes_radios',
    //causando erro no modal, olhar!!!
        
    '/assets/js/pages/components_modals',
    '/assets/js/pages/transfersIndex',
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Filtro</span></h4>
                </div>

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a class="btn btn-link btn-float has-text" data-toggle="modal" data-target="#modal_sync" onclick="qrcodeCreate('<?php echo Router::url('/',true); ?>')"><i class="icon-qrcode text-primary"></i><span>Sincronizar</span></a>
                                <a class="btn btn-link btn-float has-text" id="excelLink"><i class="icon-file-excel text-primary"></i> <span>Excel</span></a>
                                <a class="btn btn-link btn-float has-text"><i class="icon-printer2 text-primary"></i> <span>Imprimir</span></a>
                        </div>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> Filtro</a></li>
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
                                    <th>Ações</th>
                                </tr>
                        </thead>
                </table>
        </div>
        <!-- /ajax sourced data -->        

        <!-- Footer -->
        <div class="footer text-muted">
                &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->

</div>
<!-- /content area -->

<!-- sinc modal -->
<div id="modal_sync" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Modal with icons</h5>
                        </div>

                        <div class="modal-body">
                                <div class="alert alert-info alert-styled-left text-blue-800 content-group">
                        <span class="text-semibold">Here we go!</span> Example of an alert inside modal.
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>

                                <h6 class="text-semibold"><i class="icon-law position-left"></i> Sample heading with icon</h6>
                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

                                <hr>

                                <div class="panel-body">
                                        <div id="qrcode" style="position:relative; left:35%; margin-left:-50px;"> </div>                                        
                                </div>
                        </div>

                        <div class="modal-footer">
                                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                        </div>
                </div>
        </div>
</div>
<!-- /sinc modal -->
