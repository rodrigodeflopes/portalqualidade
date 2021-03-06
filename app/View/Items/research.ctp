<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/datatables_data_sources',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/pnotify.min',
    '/assets/js/plugins/forms/selects/bootstrap_multiselect',
    '/assets/js/pages/form_multiselect',
    '/assets/js/pages/itemsResearch'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Filtro</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-filter3 position-left"></i> Filtro', array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    
        <!-- Content -->
        <div class="row">
                <div class="col-lg-3">
                        
                    <!-- Task details -->
                    <div class="panel panel-flat">
                            <div class="panel-heading">
                                    <h6 class="panel-title"><i class="icon-filter3 position-left"></i> Dados do filtro</h6>
                                    <div class="heading-elements">
                                            <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                    <li><a id="formEraser" title="Limpar campos"><i class="icon-eraser2 text-orange"></i></a></li>
                                            </ul>
                                    </div>
                            </div>

                            <div class="panel-body">
                                    <?php echo $this->Form->create('Item'); ?>
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Condomínios</label>
                                                    <div class="multi-select-full">
                                                            <select id="townhouses" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Blocos</label>
                                                    <div class="multi-select-full">
                                                            <select id="towers" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Pavimentos</label>
                                                    <div class="multi-select-full">
                                                            <select id="loc1" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Apto./Hall</label>
                                                    <div class="multi-select-full">
                                                            <select id="loc2" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                            <!-- Loc3 
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Cômodo</label>
                                                    <div class="multi-select-full">
                                                            <select id="loc3" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                            /Loc3 -->
                                            <hr>
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Serviços</label>
                                                    <div class="multi-select-full">
                                                            <select id="services" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label><span class="text-semibold">Verificaçãoes</label>
                                                    <div class="multi-select-full">
                                                            <select id="checks" multiple="multiple"></select>
                                                    </div>
                                            </div>
                                
                                            <div class="no-padding">
							<ul class="navigation">
								<li> 
                                                                        <div class="checkbox">
                                                                                <label>
                                                                                        <input id="checked1" type="checkbox" class="styled">
                                                                                        Conforme                                                                                       
                                                                                </label>
                                                                                <i class="icon-thumbs-up3 text-success pull-right"></i>
                                                                        </div>                                                                         
                                                                </li>
								<li> 
                                                                        <div class="checkbox">
                                                                                <label>
                                                                                        <input id="checked2" type="checkbox" class="styled">
                                                                                        Não Conforme                                                                                         
                                                                                </label>
                                                                                <i class="icon-thumbs-down3 text-danger pull-right"></i>
                                                                        </div>                                                                         
                                                                </li>	
                                                                <li> 
                                                                        <div class="checkbox">
                                                                                <label>
                                                                                        <input id="checked3" type="checkbox" class="styled">
                                                                                        Não verificado                                                                                        
                                                                                </label>
                                                                                <i class="icon-eye-blocked pull-right"></i>
                                                                        </div>                                                                         
                                                                </li>	
							</ul>
						</div>
                                    <?php echo $this->Form->end(); ?>  
                            </div>
                    </div>
                    <!-- /task details -->
                    
                </div>
            
                <div class="col-lg-9">

                        <!-- Ajax sourced data -->
                        <div class="panel panel-flat">
                                <div class="panel-heading">
                                        <h5 class="panel-title">Resultado do filtro</h5>
                                        <div class="heading-elements">
                                                <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                </ul>
                                        </div>
                                </div>

                                <table id="tableItems" class="table datatable-itemsResearch">
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
                        
                </div>
        </div>
        <!-- /Content -->
                
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

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->

<script>
        $( document ).ready(function() {
            initSelects(<?php echo $this->Session->read('enterpriseId'); ?>);
        });
</script>

