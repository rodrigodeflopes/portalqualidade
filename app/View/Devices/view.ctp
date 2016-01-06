<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Dispositivos'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Dados do Dispositivo</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">     
          <a href="../edit/<?php echo h($device['Device']['id']); ?>" class="btn btn-primary"><i class="icon-edit"></i> Editar</a>                     
          <div class="btn-group">
          </div>
        </div>      

        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left">
                    <?php echo $this->Html->image($device['Device']['image_path'], array('class' => 'img-UserGroup')); ?>    
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <p style="font-size: 20px;"><strong><?php echo h($device['Device']['name']); ?></strong></p>
                    <p><strong>Modelo: </strong><?php echo h($device['Device']['model']); ?></p>
                    <p><strong>Plataforma: </strong><?php echo h($device['Device']['platform']); ?></p>
                    <p><strong>Versão: </strong><?php echo h($device['Device']['version']); ?></p>
                    <p><strong>Versão da App: </strong><?php echo h($device['Device']['app_version']); ?></p>
                    <p><strong>Habilitado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $device['Device']['created'])); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
