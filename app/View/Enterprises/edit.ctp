<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da obra'), array('action' => 'view', $this->data['Enterprise']['id'])); ?> <span class="divider">/</span></li>
    <li class="active">Editar obra</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        
        <div class="btn-toolbar">        
            <?php echo $this->Html->link($this->Html->tag('i', ' Salvar', array('class'=>'icon-save')), '#SaveModal', array('escape' => false, 'data-toggle'=>'modal', 'class'=>' btn btn-primary btn-mini')); ?>
            <?php echo $this->Html->link($this->Html->tag('i', ' Deletar', array('class'=>'icon-remove')), '#DeleteModal', array('escape' => false, 'data-toggle'=>'modal', 'class'=>' btn btn-danger btn-mini')); ?>
        </div>      

        <div class="well">
            <?php echo $this->Form->create('Enterprise'); ?>
            <?php echo $this->Form->input('id'); ?>
            <div class="row-fluid">
                <div class="pull-left" style='position:relative;'>
                    <?php echo $this->Html->image($this->data['Enterprise']['image_path'], array('class' => 'img-building')); ?>
                    <div style='position:absolute; bottom:10px; right:10px; color:red;'>
                        <a href="#FotoModal" data-toggle="modal"><span class='label label-info'><i class="icon-camera"></i> Foto</span></a>
                    </div>    
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'span12')); ?> 
                </div>
            </div>            
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
            
        <?php echo $this->Form->end(); ?>  
        
        <?php echo $this->Form->create('Enterprise', array('action' => 'delete', $this->data['Enterprise']['id'])); ?>
            <div class="modal small hide fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Confirmação</h3>
                    </div>
                    <div class="modal-body">
                        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Deseja realmente deletar este usuário?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn btn-danger"><i class="icon-remove"></i> Deletar</button>
                    </div>
            </div>
        <?php echo $this->Form->end(); ?>   
            
        <?php echo $this->Form->create('Enterprise', array('action' => 'image_edit/' . $this->data['Enterprise']['id'], 'type' => 'file')); ?>
            <div class="modal small hide fade" id="FotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Alterar imagem de perfil</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span2"><i class="icon-home modal-icon"></i></div> Selecione um arquivo de imagem:
                            <?php echo $this->Form->file('uploadfile', array('label' => 'Arquivo de imagem', 'class' => 'span12')); ?> 
                            <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $this->data['Enterprise']['image_path']));  ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn btn-primary"><i class="icon-save"></i> Alterar</button>
                    </div>
            </div>
        <?php echo $this->Form->end(); ?>
          
    </div>
    </div>
</div>
