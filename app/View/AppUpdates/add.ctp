<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/forms/selects/bootstrap_select.min',
    '/assets/js/pages/usersEdit'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Novo update</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-width position-left"></i> Updates', array('action' => 'index'), array('escape' => false)); ?></li>
                        <li class="active">Novo update</li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <!-- Profile info -->
        <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-user"></i> &nbsp;Informações do update</h6>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <div class="panel-body">
                        <?php echo $this->Form->create('AppUpdate', array('enctype' => 'multipart/form-data')); ?>
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-2">
                                                        <?php echo $this->Form->input('name', array('label' => 'Versão', 'class' => 'form-control')); ?>
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Arquivo APK</label>                                                                                                
                                                        <?php echo $this->Form->file('uploadfile', array('class' => 'file-styled')); ?> 
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <?php echo $this->Form->input('description', array('label' => 'Descrição', 'class' => 'form-control')); ?>
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
