<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/forms/selects/bootstrap_select.min',
    '/assets/js/pages/usersAdd'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Novo usuário</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-users position-left"></i> Usuários', array('action' => 'index'), array('escape' => false)); ?></li>
                        <li class="active">Novo usuário</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <!-- Profile info -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-user"></i> &nbsp;Informações de Perfil</h6>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <div class="panel-body">
                        <?php echo $this->Form->create('User'); ?>
                                <?php echo $this->Form->input('id'); ?>
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-5">
                                                        <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control')); ?>
                                                </div>
                                                <div class="col-md-4">
                                                        <?php echo $this->Form->input('sector', array('label' => 'Setor', 'class' => 'form-control')); ?>
                                                </div>
                                                <div class="col-md-3">
                                                        <?php echo $this->Form->input('phone', array('label' => 'Telefone', 'class' => 'form-control')); ?>
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <?php echo $this->Form->input('email', array('label' => 'Login / E-mail', 'class' => 'form-control')); ?>

                                                </div>
                                                <div class="col-md-4">
                                                        <?php echo $this->Form->input('password', array('type' => 'text', 'value' => $this->Password->generatePassword(),'label' => 'Senha provisória', 'class' => 'form-control')); ?>
                                                </div>
                                                <div class="col-md-2">  
                                                        <?php echo $this->Form->input('user_status_id', array('label' => 'Status', 'class' => 'bootstrap-select form-control')); ?> 
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