<ul class="breadcrumb">
    <li class="active">Acessos controlados</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>

        <div class="search-well">
            <div class="pull-right">  
                <?php echo $this->Html->link($this->Html->tag('i', ' Usuários', array('class'=>'icon-user')), array('controller'=>'users', 'action'=>'index'), array('escape' => false, 'class'=>' btn btn-dafault')); ?>
                <?php echo $this->Html->link($this->Html->tag('i', ' Grupos de Usuários', array('class'=>'icon-user')), array('controller'=>'groups', 'action'=>'index'), array('escape' => false, 'class'=>' btn btn-dafault')); ?>
            </div>
            <?php echo $this->Form->create('Page', array('action' => 'index', 'class' => 'form-inline')); ?> 
                <div class="row-fluid">
                    <div class="pull-left" style="margin-left: 3px"><?php echo $this->Form->input('search', array('label' => '', 'placeholder' => 'Procurar...')); ?></div>
                    <div class="pull-left" style="margin-left: 3px"><button class="btn"><i class="icon-search"></i> ir</button>
                </div>
            <?php echo $this->Form->end(); ?>  
        </div>    

        <div class="well">
            <h3><?php echo __('Acessos controlados'); ?></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Controller/Action</th>
                        <th>Nome do Acesso</th>             
                        <th>Visível</th>             
                        <th class="actions">Ações</th>
                    </tr>
                <thead>
                <tbody>                              
                    <?php foreach ($pages as $page): ?>
                        <?php if ($page['Aco']['parent_id'] == 1) { ?> <tr style="background-color: LightGray"> <?php } else { ?> <tr> <?php } ?>
                            <td><strong><?php echo h($page['Aco']['alias']); ?>&nbsp;</strong></td>   
                            <?php if (!$page['Page']['name']) { ?> <td><a href="#AddPageModal" data-toggle="modal" onclick="acoEdit(<?php echo $page['Aco']['id']; ?>)"><span class="label label-important"><i class="icon-plus"></i> Adicionar um nome para este acesso</span></a><?php } else { ?> <td><?php if($page['Page']['id']){ echo $this->Html->link(h($page['Page']['name']), array('action'=>'view', $page['Page']['id']), array('escape' => false)); }?>&nbsp;</td> <?php } ?>  
                            <td><strong><?php echo h($page['Page']['enable']); ?>&nbsp;</strong></td>   
                            <td>
                                <strong><?php if($page['Page']['id']){ echo $this->Html->link($this->Html->tag('i', ' Ver', array('class'=>'icon-eye-open')), array('action'=>'view', $page['Page']['id']), array('escape' => false)); }?><strong>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>    

         <?php echo $this->Form->create('Page', array('action' => 'add')); ?>
            <div class="modal small hide fade" id="AddPageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Nome de acesso</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div><?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'span12')); ?></div>
                            <div><?php echo $this->Form->input('enable', array('label' => 'Visível')); ?></div>
                            <?php echo $this->Form->input('aco_id', array('type' => 'hidden')); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn btn-primary"><i class="icon-save"></i> Salvar</button>
                    </div>
            </div>
        <?php echo $this->Form->end(); ?>  

    </div>       
</div>   

<script type="text/javascript">  
    function acoEdit(aco_id){
        document.getElementById('PageAcoId').value = aco_id;
    }
</script>

