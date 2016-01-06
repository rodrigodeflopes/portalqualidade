<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Acessos controlados'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Dados do acesso</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">    
            <?php echo $this->Html->link($this->Html->tag('i', ' Editar', array('class'=>'icon-edit')), array('action'=>'edit', $page['Page']['id']), array('escape' => false, 'class'=>'btn btn-primary')); ?>                      
        </div>      

        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left" style='position:relative;'>
                    <?php echo $this->Html->image('/images/lock.jpg', array('class' => 'img-UserGroup')); ?>
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <h2><?php echo h($page['Page']['name']); ?></h2>
                    <p><strong>Visível: </strong><?php echo h($page['Page']['enable']); ?></p>
                    <p><strong>Criado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $page['Page']['created'])); ?></p>
                    <p><strong>Modificado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $page['Page']['modified'])); ?></p>
                </div>   
            </div>
            <br>
            <div>
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#belogsto" data-toggle="tab">Acesso Permitido à</a></li>
                </ul>  
                <div id="myTabContent" class="tab-content">  
                    <div class="tab-pane active in" id="belogsto">                        
                        <div class="well">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 26px;">Avatar</th> 
                                        <th>Nome</th> 
                                        <th class="actions">Ações</th>
                                    </tr>
                                <thead>
                                <tbody>                              
                                    <?php foreach ($usersGroups as $usersGroup): ?>
                                        <tr>
                                            <td><?php echo $this->Html->image($usersGroup['image_path'], array('class' => 'img-face1')); ?></td>            
                                            <td><?php echo $this->Html->link(h($usersGroup['name']), array('controller'=> $usersGroup['controller'] ,'action'=>'view', $usersGroup['id']), array('escape' => false)); ?>&nbsp;</td>    
                                            <td>
                                                <strong><?php echo $this->Html->link($this->Html->tag('i', ' Ver', array('class'=>'icon-eye-open')), array('controller'=> $usersGroup['controller'] ,'action'=>'view', $usersGroup['id']), array('escape' => false)); ?></strong>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>