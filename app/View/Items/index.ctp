<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/datatables_data_sources',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/pnotify.min',
    '/assets/js/plugins/forms/selects/bootstrap_multiselect',
        
    '/assets/js/pages/components_modals',
    '/assets/js/pages/itemsIndex',
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Exportar</span></h4>
                </div>

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a class="btn btn-link btn-float has-text" data-toggle="modal" data-target="#modal_sync" onclick="qrcodeCreate('<?php echo Router::url('/',true); ?>')"><i class="icon-qrcode text-primary"></i><span>Sincronizar</span></a>
                                <a class="btn btn-link btn-float has-text" id="excelLink"><i class="icon-file-excel text-primary"></i> <span>Excel</span></a>
                        </div>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-upload position-left"></i> Exportar', array('action' => 'index'), array('escape' => false)); ?></li>
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
                                    <th>Cond./Bloco</th>
                                    <th>Pavimento</th>
                                    <th>Apto/Hall</th>
                                    <th>Serviço - FVS</th>
                                    <th>Verificação</th>
                                    <th>Status</th>
                                    <th>Foto</th>
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

<!-- sinc modal -->
<div id="modal_sync" class="modal fade">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class=" icon-download"></i> &nbsp;Exportação de FVS para dispositivo</h5>
                        </div>

                        <div class="modal-body">
                                <div class="alert alert-info alert-styled-left text-blue-800 content-group">
                                    <span class="text-semibold">ATENÇÃO!</span> Esta operação causa sobreposição de arquivos
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                </div>

                                <h6 class="text-semibold"><i class="icon-bubbles10 position-left"></i> Instruções de exportação</h6>
                                <p>A exportação para o dispositivo só ocorre um bloco por vez. O bloco selecionado para a exportação será transmitido totalmente. Todas as FVS serão recarregadas em seu dispositivo conforme estão na última versão sincronizada no portal QualiTab.</p>

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

<!-- Photo modal -->
        <div id="modal_photo" class="modal fade">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"><i class="icon-camera position-left"></i>&nbsp;Fotos registradas</h5>
                                </div>

                                <div class="modal-body">
                                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" id="carouselInner">
                                                    <div class="item active"></div>
                                                </div>
                                                <!-- /Wrapper for slides -->

                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                </a>
                                                <!-- /Controls -->
                                        </div>
                                </div>

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
                                </div>
                        </div>
                </div>
        </div>
        <!-- /Photo modal -->
        
        <!-- Note modal -->
        <div id="modal_note" class="modal fade">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"><i class="icon-comments position-left"></i>&nbsp;Observações registradas</h5>
                                </div>

                                <div id="note" class="modal-body">
                                      
                                </div>

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
                                </div>
                        </div>
                </div>
        </div>
        <!-- /Note modal -->