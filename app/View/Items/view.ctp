<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Obras'), array('controller' => 'enterprises', 'action' => 'index')); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da obra'), array('controller' => 'enterprises', 'action' => 'view', $item['Tower']['id'])); ?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link(__('Dados da Torre/Bloco'), array('controller' => 'enterprises', 'action' => 'view', $item['Tower']['id'])); ?> <span class="divider">/</span></li>
    <li class="active">Dados do Item</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">     
          <a href="../edit/<?php echo h($item['Tower']['id']); ?>" class="btn btn-primary"><i class="icon-edit"></i> Editar</a>                     
          <div class="btn-group">
          </div>
        </div>      

        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left">
                    <p style="font-size: 20px;"><strong><?php echo h($item['Item']['name']); ?></strong></p>
                    <p><strong>Loc1: </strong><?php echo h($item['Item']['loc1']); ?></p>
                    <p><strong>Loc2: </strong><?php echo h($item['Item']['loc2']); ?></p>
                    <p><strong>Loc3: </strong><?php echo h($item['Item']['loc3']); ?></p>
                    <p><strong>Serviço: </strong><?php echo h($item['Item']['loc4']); ?></p>
                    <p><strong>Verificação: </strong><?php echo h($item['Item']['method']); ?></p>
                    <p><strong>Criado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $item['Item']['created'])); ?></p>
                    <p><strong>Modoficado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $item['Item']['modified'])); ?></p>
                    <p><strong>Modificado por: </strong><?php echo h($item['Item']['user_modified']); ?></p>
                </div>
            </div>
        </div>
        
        <div class="well">
            <h3><?php echo __('Medições'); ?></h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Transfer Id'); ?></th>
                        <th><?php echo __('Checked'); ?></th>
                        <th><?php echo __('Note'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Modified'); ?></th>
                    </tr>
                <thead>
                <tbody>                              
                    <?php foreach ($item['Measurement'] as $measurement): ?>
                        <tr>                                        
                            <td><?php echo $measurement['id']; ?></td>
                            <td><?php echo $measurement['transfer_id']; ?></td>
                            <?php   if(Set::check($item, 'Measurement')){ ?>
                                <?php if($measurement['checked'] === '1'){ ?>
                                    <td><i class='icon-thumbs-up' style='font-size: 22px; color:green;'></i></td>
                                <?php }else if($measurement['checked'] === '2'){ ?>
                                    <td><i class='icon-thumbs-down' style='font-size: 22px; color:red;'></i></td>
                                <?php }else if($measurement['checked'] === '3'){ ?>
                                    <td><i class='icon-thumbs-up' style='font-size: 22px; color:orange;'></i></td> 
                                <?php }else{ ?>
                                    <td></td> 
                                <?php } ?>
                            <?php }else{ ?>
                                    <td></td>    
                            <?php } ?>               
                            <td><?php echo $measurement['note']; ?></td>
                            <td><?php echo h($this->Time->format('d/M/Y H:m', $measurement['created'])); ?>&nbsp;</td>  
                            <td><?php echo h($this->Time->format('d/M/Y H:m', $measurement['modified'])); ?>&nbsp;</td>  
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
