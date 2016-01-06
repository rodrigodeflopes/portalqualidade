<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da obra'), array('controller' => 'enterprises', 'action' => 'view', $this->data['Item']['id'])); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da Torre/Bloco'), array('controller' => 'enterprises', 'action' => 'view', $this->data['Item']['id'])); ?> <span class="divider">/</span></li>
    <li class="active">Dados do Item</li>
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
            <?php echo $this->Form->create('Item', array('type' => 'file', 'accept' => 'image/*', 'onchange' => 'loadFile(event)')); ?>
            <?php echo $this->Form->input('id'); ?>
            <div class="row-fluid" style=" margin-top: 1.5em;">    
                    <?php echo $this->Form->input('loc1', array('label' => 'Loc1', 'class' => 'span3')); ?>
                    <?php echo $this->Form->input('loc2', array('label' => 'Loc2', 'class' => 'span3')); ?>
                    <?php echo $this->Form->input('loc3', array('label' => 'Loc3', 'class' => 'span3')); ?>
                    <?php echo $this->Form->input('loc4', array('label' => 'Serviço', 'class' => 'span3')); ?>
                    <?php echo $this->Form->input('name', array('label' => 'Verificação', 'class' => 'span3')); ?>
                    <?php echo $this->Form->input('method', array('label' => 'Método de Verificação', 'class' => 'span3')); ?>
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
        
            <?php echo $this->Form->create('Item', array('action' => 'delete', $this->data['Item']['id'])); ?>
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
