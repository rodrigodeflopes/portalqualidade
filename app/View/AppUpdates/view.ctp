<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('App Updates'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Dados da versão</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">     
          <a href="../edit/<?php echo h($appUpdate['AppUpdate']['id']); ?>" class="btn btn-primary"><i class="icon-edit"></i> Editar</a>                     
          <div class="btn-group">
          </div>
        </div>      

        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left">
                    <?php echo $this->Html->image('devices.png', array('class' => 'img-UserGroup')); ?>    
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <p style="font-size: 20px;"><strong><?php echo h($appUpdate['AppUpdate']['name']); ?></strong></p>
                    <p><strong>Descrição: </strong><?php echo h($appUpdate['AppUpdate']['description']); ?></p>
                    <p><strong>Criado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $appUpdate['AppUpdate']['created'])); ?></p>
                    <p><strong>Modificado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $appUpdate['AppUpdate']['modified'])); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>