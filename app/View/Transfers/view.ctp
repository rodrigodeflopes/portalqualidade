<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da obra'), array('controller' => 'enterprises', 'action' => 'view', $transfer['Transfer']['id'])); ?> <span class="divider">/</span></li>
    <li class="active">Dados da Torre/Bloco</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>          
        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left">
                    <p><strong>Dispositivo: <?php echo h($transfer['Device']['name']); ?></strong></p>
                    <p><strong>Criado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $transfer['Transfer']['created'])); ?></p>
                    <p><strong>Modoficado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $transfer['Transfer']['modified'])); ?></p>
                    <p><strong>Modificado por: </strong><?php echo h($transfer['Transfer']['user_modified']); ?></p>
                </div>
                <div class="btn-toolbar pull-right">     
                    <a href="#DeleteModal" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon-remove"></i> Apagar</a>     
                </div>
            </div>
            <?php echo $this->Form->create('Transfer', array('action' => 'delete/' . $transfer['Transfer']['id'] . '/' .  $transfer['Tower']['id'])); ?>
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
            
        <div class="well">
            <div class="btn-toolbar pull-right"> 
                <?php echo $this->Html->link($this->Html->tag('i', ' Download', array('class'=>'icon-download-alt')), array('action'=>'csv', $transfer['Transfer']['id']), array('escape' => false, 'class'=>'btn btn-primary btn-mini')); ?>
            </div>
            <h3><?php echo __('Medições'); ?></h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Loc1</th>
                        <th>Loc2</th>
                        <th>Loc3</th>
                        <th>Serviço</th>
                        <th>Verificação</th>
                        <th>Verif.</th>
                        <th>Desc. problema</th>
                    </tr>
                <thead>
                <tbody>                              
                    <?php foreach ($measurements as $measurement): ?>
                        <tr>                                        
                            <td><?php echo $measurement['Item']['loc1']; ?></td>
                            <td><?php echo $measurement['Item']['loc2']; ?></td>
                            <td><?php echo $measurement['Item']['loc3']; ?></td>
                            <td><?php echo $measurement['Item']['loc4']; ?></td>
                            <td><strong><?php echo $this->Html->link(h($measurement['Item']['name']), array('controller' => 'items', 'action'=>'view', $measurement['Item']['id']), array('escape' => false)); ?>&nbsp;</strong></td>  
                            <?php if($measurement['Measurement']['checked'] === '1'){ ?>
                                <td><i class='icon-thumbs-up' style='font-size: 22px; color:green;'></i></td>
                            <?php }else if($measurement['Measurement']['checked'] === '2'){ ?>
                                <td><i class='icon-thumbs-down' style='font-size: 22px; color:red;'></i></td>
                            <?php }else if($measurement['Measurement']['checked'] === '3'){ ?>
                                <td><i class='icon-thumbs-up' style='font-size: 22px; color:orange;'></i></td> 
                            <?php }else{ ?>
                                <td></td> 
                            <?php } ?> 
                            <td><?php echo $measurement['Measurement']['note']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->element('pagination', array('model' => 'Measurement')); ?>
         </div>  
    </div>
</div>