<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da obra'), array('action' => 'view', $this->data['Tower']['id'])); ?> <span class="divider">/</span></li>
    <li class="active">Novo Bloco/Torre</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>

        <div class="btn-toolbar">        
            <?php echo $this->Html->link($this->Html->tag('i', ' Salvar', array('class'=>'icon-save')), '#myModal', array('escape' => false, 'data-toggle'=>'modal', 'class'=>' btn btn-primary btn-mini')); ?>
        </div>    

        <div class="well">
            <?php echo $this->Form->create('Tower'); ?>
                
                <div class="toc">
                    <?php echo $this->Html->image('building.png', array('class' => 'img-building')); ?>
                </div>
                <?php 
                    echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'span3'));
                    echo $this->Form->input('enterprise_id', array('type' => 'hidden', 'value' => 1));
                    echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => 'building.png'));
                ?>   

                <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        </div>
    </div>
</div>