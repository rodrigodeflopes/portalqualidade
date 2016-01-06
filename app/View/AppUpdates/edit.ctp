<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('App Updates'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da versão'), array('action' => 'view', $this->data['AppUpdate']['id'])); ?> <span class="divider">/</span></li>
    <li class="active">Editar da versão</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        
        <div class="btn-toolbar">        
          <a href="#SaveModal" data-toggle="modal" class="btn btn-primary"><i class="icon-save"></i> Salvar</a>  
          <a href="#DeleteModal" data-toggle="modal" class="btn btn-danger"><i class="icon-remove"></i> Apagar</a>
          <div class="btn-group">
          </div>
        </div>      

        <div class="well">
            <?php echo $this->Form->create('AppUpdate', array('type' => 'file', 'accept' => 'image/*', 'onchange' => 'loadFile(event)')); ?>
            <?php echo $this->Form->input('id'); ?>
                <div class="row-fluid">
                    <div class="span2">
                        <?php echo $this->Html->image('devices.png', array('id' => 'image_file', 'class' => 'img-UserGroup')); ?> 
                    </div>
                </div>
            <div class="row-fluid" style=" margin-top: 1.5em;">    
                    <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'span3')); ?>

                    <div class="modal small hide fade" id="SaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Confirmação</h3>
                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Deseja salvar as alterações?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                            <button class="btn btn-primary"><i class="icon-save"></i> Salvar</button>
                        </div>
                    </div> 
                </div> 
            <?php echo $this->Form->end(); ?>  
        
            <?php echo $this->Form->create('Device', array('action' => 'delete', $this->data['Device']['id'])); ?>
                <div class="modal small hide fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Confirmação</h3>
                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Deseja realmente deletar?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                            <button class="btn btn-danger"><i class="icon-remove"></i> Deletar</button>
                        </div>
                </div>
            <?php echo $this->Form->end(); ?>      
          
        </div>
    </div>
</div>



<div class="appUpdates form">
<?php echo $this->Form->create('AppUpdate'); ?>
	<fieldset>
		<legend><?php echo __('Edit App Update'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('app_path');
		echo $this->Form->input('description');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AppUpdate.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('AppUpdate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List App Updates'), array('action' => 'index')); ?></li>
	</ul>
</div>
