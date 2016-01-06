<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/datatables_basic.js',
    '/assets/js/pages/components_modals',
    '/assets/js/pages/devicesIndex',
    '/js/qrcode/qrcode'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dispositivos</span></h4>
                </div>

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a class="btn btn-link btn-float has-text" data-toggle="modal" data-target="#modal_sync" onclick="qrcodeCreate('<?php echo Router::url('/',true); ?>')"><i class="icon-qrcode text-primary"></i><span>Adicionar</span></a>
                        </div>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> Dispositivos</a></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    
        <!-- Basic datatable -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                        <h5 class="panel-title">Lista de dispositivos</h5>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <table class="table datatable-basic">
                        <thead>
                                <tr>
                                        <th></th>
                                        <th>Nome</th>                                
                                        <th>Modelo</th>
                                        <th>UUID</th>
                                        <th>Plataforma</th>
                                        <th>Versão</th>
                                        <th>Versão App</th>
                                        <th>Criado</th>
                                        <th>Modificado</th>                                
                                        <th class="text-center">Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($devices as $device): ?>
                                        <tr>
                                                <td><?php echo $this->Html->image($device['Device']['image_path'], array('class' => 'img-circle img-sm')); ?></td>
                                                <td><?php echo $this->Html->link(h($device['Device']['name']), array('action'=>'view', $device['Device']['id']), array('escape' => false)); ?>&nbsp;</td>
                                                <td><?php echo h($device['Device']['model']); ?>&nbsp;</td>
                                                <td><?php echo h($device['Device']['uuid']); ?>&nbsp;</td>
                                                <td><?php echo h($device['Device']['platform']); ?>&nbsp;</td>
                                                <td><?php echo h($device['Device']['version']); ?>&nbsp;</td>
                                                <td><?php echo h($device['Device']['app_version']); ?>&nbsp;</td>
                                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $device['Device']['created'])); ?>&nbsp;</td>
                                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $device['Device']['modified'])); ?>&nbsp;</td>              
                                                <td class="text-center">
                                                        <ul class="icons-list">
                                                                <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="icon-menu9"></i>
                                                                        </a>

                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                <li><a href="#"><i class=" icon-pencil5"></i> Editar</a></li>
                                                                                <li><a href="#"><i class="icon-folder-remove"></i> Excluir</a></li>
                                                                        </ul>
                                                                </li>
                                                        </ul>
                                                </td>
                                        </tr>
                                <?php endforeach; ?>
                        </tbody>
                </table>
        </div>
        <!-- /basic datatable -->

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
                                <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Habilitar novo dispositivo</h5>
                        </div>

                        <div class="modal-body">
                                <div class="alert alert-info alert-styled-left text-blue-800 content-group">
                        <span class="text-semibold">Here we go!</span> Example of an alert inside modal.
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>

                                <h6 class="text-semibold"><i class="icon-law position-left"></i> Habilitar novo dispositivo</h6>
                                <p>Para habilitar utilize o leitor de Qr-code do aplicativo instalado no dispositivo.</p>

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