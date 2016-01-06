<ul class="breadcrumb">
    <li class="active">App Updates</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>

        <div class="search-well">
            <?php echo $this->Form->create('AppUpdate', array('action' => 'index', 'class' => 'form-inline')); ?> 
                <div class="row-fluid">
                    <?php echo $this->Html->link($this->Html->tag('i', ' Adicionar', array('class'=>'icon-plus')), array('action'=>'add'), array('escape' => false, 'class'=>'pull-left btn btn-primary')); ?>
                    <div class="pull-left" style="margin-left: 3px"><?php echo $this->Form->input('search', array('label' => '', 'placeholder' => 'Procurar...')); ?></div>
                    <div class="pull-left" style="margin-left: 3px"><button class="btn"><i class="icon-search"></i> ir</button>
                </div>
            <?php echo $this->Form->end(); ?>  
        </div>
    

        <div class="well">
                <h3><?php echo __('Change Logs'); ?></h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Versão</th>                                
                            <th>Descrição</th>
                            <th>Criado</th>
                            <th>Modificado</th>                                
                            <th class="actions">Ações</th>
                        </tr>
                    <thead>
                    <tbody>                              
                        <?php foreach ($appUpdates as $appUpdate): ?>
                            <tr>
                                <td><?php echo $this->Html->link(h($appUpdate['AppUpdate']['name']), array('action'=>'view', $appUpdate['AppUpdate']['id']), array('escape' => false)); ?>&nbsp;</td>
                                <td><?php echo h($appUpdate['AppUpdate']['description']); ?>&nbsp;</td>
                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $appUpdate['AppUpdate']['created'])); ?>&nbsp;</td>
                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $appUpdate['AppUpdate']['modified'])); ?>&nbsp;</td>                                
                                <td>
                                    <strong><?php echo $this->Html->link($this->Html->tag('i', ' Ver', array('class'=>'icon-eye-open')), array('action'=>'view', $appUpdate['AppUpdate']['id']), array('escape' => false)); ?></strong>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>                       
    </div>       
</div>  