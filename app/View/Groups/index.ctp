<ul class="breadcrumb">
    <li class="active">Grupos de usuários</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>

        <div class="search-well">
            <div class="pull-right">
                <?php echo $this->Html->link($this->Html->tag('i', ' Acessos Controlados', array('class'=>'icon-user')), array('controller'=>'pages', 'action'=>'index'), array('escape' => false, 'class'=>'btn btn-primry')); ?>
            </div>
            <?php echo $this->Form->create('Group', array('action' => 'index', 'class' => 'form-inline')); ?> 
                <div class="row-fluid">
                    <?php echo $this->Html->link($this->Html->tag('i', ' Adicionar', array('class'=>'icon-plus')), array('action'=>'add'), array('escape' => false, 'class'=>'btn btn-primary pull-left')); ?>
                    <div class="pull-left" style="margin-left: 3px"><?php echo $this->Form->input('search', array('label' => '', 'placeholder' => 'Procurar...')); ?></div>
                    <div class="pull-left" style="margin-left: 3px"><button class="btn"><i class="icon-search"></i> ir</button>
                </div>
            <?php echo $this->Form->end(); ?>  
        </div>    

        <div class="well">
                <h3><?php echo __('Grupos de usuários'); ?></h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 26px;">Avatar</th>
                            <th>Nome</th>      
                            <th>Criado</th>
                            <th>Modificado</th>                                
                            <th class="actions">Ações</th>
                        </tr>
                    <thead>
                    <tbody>                              
                        <?php foreach ($groups as $group): ?>
                            <tr>
                                <td><?php echo $this->Html->image($group['Group']['image_path'], array('class' => 'img-face1')); ?></td>
                                <td><?php echo $this->Html->link(h($group['Group']['name']), array('action'=>'view', $group['Group']['id']), array('escape' => false)); ?>&nbsp;</td>
                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $group['Group']['created'])); ?>&nbsp;</td>
                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $group['Group']['modified'])); ?>&nbsp;</td>                                
                                <td>
                                    <strong><?php echo $this->Html->link($this->Html->tag('i', ' Ver', array('class'=>'icon-eye-open')), array('action'=>'view', $group['Group']['id']), array('escape' => false)); ?></strong>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>                       
    </div>       
</div>   
