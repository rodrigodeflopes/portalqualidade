<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/pnotify.min',
    '/assets/js/plugins/forms/selects/bootstrap_multiselect',        
    '/assets/js/pages/components_modals',
    '/assets/js/pages/datatables_data_sources',
    '/assets/js/pages/itemsOverviewList',
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Terminalidade detalhado</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-office position-left"></i> Terminalidades', array('action' => 'overview'), array('escape' => false)); ?></li>
                        <li class="active">Terminalidade detalhado</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">         

        <!-- Ajax sourced data -->
        <div class="panel panel-flat">
                <table id="tableItems" class="table">
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


<script type="text/javascript">
    $(document).ready(function () {
        inputDataTable('<?php echo $towerId; ?>', '<?php echo $location2Id; ?>');
    });
</script>