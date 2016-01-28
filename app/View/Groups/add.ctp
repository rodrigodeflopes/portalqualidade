<!-- Theme JS files -->
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Novo grupo de usuários</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-users4 position-left"></i> Grupos de usuários', array('action' => 'index'), array('escape' => false)); ?></li>
                        <li class="active">Novo grupo de usuários</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <!-- Profile info -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-user"></i> &nbsp;Informações do grupo</h6>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <div class="panel-body">
                        <?php echo $this->Form->create('Group'); ?>
                                <?php echo $this->Form->input('id'); ?>
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-5">
                                                        <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control')); ?>
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