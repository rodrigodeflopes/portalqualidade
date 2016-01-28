<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/pages/form_checkboxes_radios',
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/forms/styling/switchery.min',
    '/assets/js/plugins/forms/styling/switch.min'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Novo acesso controlado</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-stackoverflow position-left"></i> Acessos controlados', array('action' => 'index'), array('escape' => false)); ?></li>
                        <li class="active">Novo acesso controlado</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <!-- Profile info -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-user"></i> &nbsp;Informações do acesso controlado</h6>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <div class="panel-body">
                        <?php echo $this->Form->create('Page'); ?>
                                <div class="form-group">
                                    <h5 class="text-blue"><i class="icon-arrow-right6 position-left"></i><?php echo $acoParent['Aco']['alias']; ?> / <?php echo $aco['Aco']['alias']; ?></h5>
                                    <hr>
                                </div>
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-5">
                                                        <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control')); ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-5">
                                                        <?php echo $this->Form->input('enable', array('label' => 'Visível', 'class' => 'control-primary')); ?>
                                                </div>
                                        </div>
                                </div>

                                <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Salvar <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                        <?php echo $this->Form->end(); ?>      
                </div>
        </div>
        <!-- /profile info -->
                        
        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->