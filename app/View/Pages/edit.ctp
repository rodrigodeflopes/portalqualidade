<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/notifications/bootbox.min',
    '/assets/js/plugins/notifications/sweet_alert.min',
    '/assets/js/pages/pagesEdit'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">cesso controlado</span></h4>

                        <ul class="breadcrumb position-right">
                                <li><?php echo $this->Html->link('<i class="icon-stackoverflow position-left"></i> Acessos controlados', array('action' => 'index'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('Acesso controlado', array('action' => 'view', $this->request->data['Page']['id']), array('escape' => false)); ?></li>
                                <li class="active">Editar Acesso controlado</li>
                        </ul>
                </div>
        </div>

        <!-- Toolbar -->
        <div class="navbar navbar-default navbar-xs">
                <ul class="nav navbar-nav visible-xs-block">
                        <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                </ul>

                <div class="navbar-collapse collapse" id="navbar-filter">
                        <ul class="nav navbar-nav element-active-slate-400">
                                <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-stackoverflow position-left"></i> Perfil</a></li>
                        </ul>
                </div>
        </div>
        <!-- /toolbar -->
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <?php echo $this->Session->flash(); ?> 
        <!-- Page profile -->        
        <div class="tabbable">
                <div class="tab-content">                                        
                        <div class="tab-pane fade in active" id="profile">
                                <!-- Profile info -->
                                <div class="panel panel-flat">
                                        <div class="panel-heading">
                                                <h6 class="panel-title">Informações do acesso controlado</h6>
                                                <div class="heading-elements">
                                                        <ul class="icons-list">
                                                                <li><a data-action="collapse"></a></li>
                                                                <li><a data-action="reload"></a></li>
                                                        </ul>
                                                </div>
                                        </div>

                                        <div class="panel-body"> 
                                                <?php echo $this->Form->create('Page'); ?>
                                                        <?php echo $this->Form->input('id'); ?>
                                                        <div class="form-group">
                                                                <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control')); ?>
                                                        </div>
                                            
                                                        <div class="form-group">
                                                                <?php echo $this->Form->input('enable', array('label' => 'Visível', 'class' => 'control-primary')); ?>
                                                        </div>

                                                        <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Salvar <i class="icon-arrow-right14 position-right"></i></button>
                                                                <button type="button" class="btn btn-danger" onclick="page_delete('<?php echo $this->request->data['Page']['id']; ?>')">Excluir <i class="icon-folder-remove position-right"></i></button>
                                                        </div>
                                                <?php echo $this->Form->end(); ?>
                                        </div>
                                </div>
                                <!-- /profile info -->

                        </div>
                </div>
        </div>
        <!-- /Page profile -->

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->