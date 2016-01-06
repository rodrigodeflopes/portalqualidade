<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Principal'), array('controller' => 'main','action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Minha conta</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>

        <div class="btn-toolbar">        
          <a href="#SaveModal" data-toggle="modal" class="btn btn-primary"><i class="icon-save"></i> Salvar</a>  
          <div class="btn-group">
          </div>
        </div>      

        <div class="well">
            <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                <?php echo $this->Form->input('id'); ?>

                <ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab">Perfil</a></li>
                  <li><a href="#redefine" data-toggle="tab">Redefinir Senha</a></li>
                </ul>  

                <div id="myTabContent" class="tab-content">  
                    <div class="tab-pane active in" id="home">
                        <div class="pull-left" style="position:relative;">
                            <?php echo $this->Html->image($this->request->data['User']['image_path'], array('class' => 'img-UserGroup')); ?>
                            <div style='position:absolute; bottom:10px; right:10px; color:red;'>
                                <a href="#FotoModal" data-toggle="modal"><span class='label label-info'><i class="icon-camera"></i> Foto</span></a>
                            </div>    
                        </div>
                        <div class="pull-left" style="margin-left: 40px;">
                            <?php 
                                echo $this->Form->input('name', array('label' => 'Nome'));
                                echo $this->Form->input('email', array('label' => 'E-mail de acesso')); 
                            ?>
                            <p><strong>Último acesso: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $this->request->data['User']['modified'])); ?></p>
                        </div>                           
                    </div>

                    <div class="tab-pane fade" id="redefine">
                        <?php 
                            echo $this->Form->input('password', array('type' => 'hidden', 'label' => 'Redefinir Senha'));
                            echo $this->Form->input('new_password', array('type' => 'password', 'value' => $this->data['User']['password'], 'label' => 'Nova senha', 'class' => 'span3'));
                        ?>
                    </div>

                </div>

                <div class="modal small hide fade" id="SaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <div class="modal small hide fade" id="FotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Alterar imagem de perfil</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="span2"><i class="icon-user modal-icon"></i></div> Selecione um arquivo de imagem:
                                <?php echo $this->Form->file('uploadfile', array('label' => 'Arquivo de imagem', 'class' => 'span12')); ?> 
                                <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $this->request->data['User']['image_path']));  ?>
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



