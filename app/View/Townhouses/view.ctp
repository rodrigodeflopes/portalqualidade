<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Blocos</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">     
            <?php echo $this->Html->link($this->Html->tag('i', ' Editar', array('class'=>'icon-edit')), array('action'=>'edit', $townhouse['Townhouse']['id']), array('escape' => false, 'class'=>'btn btn-primary btn-mini')); ?>     
        </div>  
        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left">
                    <p><?php echo $this->Html->image($townhouse['Townhouse']['image_path'], array('class' => 'img-building')); ?></p> 
                </div> 
                <div class="pull-left span8">
                    <h3><?php echo $townhouse['Townhouse']['name']; ?></h3>
                </div>
                <?php echo $this->Form->create('Townhouse', array('action' => 'image_edit/' . $townhouse['Townhouse']['id'], 'type' => 'file')); ?>
                        <div class="modal small hide fade" id="FotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel">Alterar imagem de perfil</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row-fluid">
                                        <div class="span2"><i class="icon-home modal-icon"></i></div> Selecione um arquivo de imagem:
                                        <?php echo $this->Form->file('uploadfile', array('label' => 'Arquivo de imagem', 'class' => 'span12')); ?> 
                                        <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $enterprise['Enterprise']['image_path']));  ?>
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
    <div class="row-fluid">
            <div class="well">
                <div style="float:right; margin-top: 1em;">
                    <?php echo $this->Html->link($this->Html->tag('i', ' Adicionar', array('class'=>'icon-plus')), array('controller' => 'towers', 'action'=>'add'), array('escape' => false, 'class'=>'btn btn-primary btn-mini')); ?>         						
                </div>
                <h3><?php echo __('Blocos'); ?></h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 26px;"></th>
                            <th>Nome</th>                            
                        </tr>
                    <thead>
                    <tbody>                              
                        <?php foreach ($townhouse['Tower'] as $tower): ?>
                            <tr>
                                <td><?php echo $this->Html->image($tower['image_path'], array('class' => 'img-face1')); ?></td>
                                <td><strong><?php echo $this->Html->link(h($tower['name']), array('controller' => 'towers', 'action'=>'view', $tower['id']), array('escape' => false)); ?>&nbsp;</strong></td>        
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>