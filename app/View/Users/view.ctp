<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Usuários'), array('action' => 'index')); ?> <span class="divider">/</span></li>
    <li class="active">Dados do usuário</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="btn-toolbar">     
          <?php echo $this->Html->link($this->Html->tag('i', ' Editar', array('class'=>'icon-edit')), array('action'=>'edit', $user['User']['id']), array('escape' => false, 'class'=>'btn btn-primary')); ?>     
        </div>  
        <div class="well"> 
            <div class="row-fluid">
                <div class="pull-left" style='position:relative;'>
                    <?php echo $this->Html->image($user['User']['image_path'], array('class' => 'img-UserGroup')); ?>
                    <div style='position:absolute; bottom:10px; right:10px; color:red;'>
                        <a href="#FotoModal" data-toggle="modal"><span class='label label-info'><i class="icon-camera"></i> Foto</span></a>
                    </div>    
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <h2><?php echo h($user['User']['name']); ?></h2>
                    <p><?php echo h($user['User']['email']); ?></p>
                    <p><strong>Criado: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $user['User']['created'])); ?></p>
                    <p><strong>Último acesso: </strong><?php echo h($this->Time->format('d/m/Y H:i:s', $user['User']['modified'])); ?></p>
                </div>
                <div class="pull-left" style="margin-left: 40px;">
                    <h2><span class="label label-success"><?php echo h($user['User']['status']); ?></span></h2>
                </div>
                <?php echo $this->Form->create('User', array('action' => 'image_edit', $user['User']['id'], 'type' => 'file')); ?>
                        <div class="modal small hide fade" id="FotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel">Alterar imagem de perfil</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row-fluid">
                                        <div class="span2"><i class="icon-user modal-icon"></i></div> Selecione um arquivo de imagem:
                                        <?php echo $this->Form->file('uploadfile', array('label' => 'Arquivo de imagem', 'class' => 'span12')); ?> 
                                        <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $user['User']['image_path']));  ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    <button class="btn btn-primary"><i class="icon-save"></i> Alterar</button>
                                </div>
                        </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <br>
            <div class="row-fluid">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#belogsto" data-toggle="tab">Membro de</a></li>
                  <li><a href="#permissions" data-toggle="tab">Permissões</a></li>
                </ul>  
                <div id="myTabContent" class="tab-content">  
                    <div class="tab-pane active in" id="belogsto">
                        <div class="btn-toolbar">    
                            <?php echo $this->Html->link($this->Html->tag('i', ' Novo Grupo', array('class'=>'icon-plus')), '#SaveModal', array('escape' => false, 'data-toggle'=>'modal', 'class'=>' btn btn-primary')); ?>
                        </div>     
                        <div class="well">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 26px;">Avatar</th>
                                        <th>Grupo</th>                                           
                                        <th class="actions">Ações</th>
                                    </tr>
                                <thead>
                                <tbody>                              
                                    <?php foreach ($belongs as $belong): ?>
                                        <tr>
                                            <td><?php echo $this->Html->image($belong['parent']['image_path'], array('class' => 'img-face1')); ?></td>
                                            <td><?php echo $this->Html->link(h($belong['parent']['name']), array('controller'=>'groups', 'action'=>'view', $belong['Aro']['parent_id']), array('escape' => false)); ?>&nbsp;</td>                             
                                            <td>
                                                <strong><?php echo $this->Html->link($this->Html->tag('i', ' Ver', array('class'=>'icon-eye-open')), array('controller'=>'groups', 'action'=>'view', $belong['Aro']['parent_id']), array('escape' => false)); ?><strong>
                                                <strong>&nbsp; | &nbsp;<?php echo $this->Html->link($this->Html->tag('i', ' Deletar', array('class'=>'icon-remove')), '#DeleteAroModal', array('escape' => false, 'data-toggle'=>'modal', 'onclick'=>'delete_aro('.$belong['Aro']['id'].')')); ?><strong>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>  
                        <?php echo $this->Form->create('User', array('action' => 'groups_add/'.$user['User']['id'])); ?>
                            <div class="modal small hide fade" id="SaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Novo Grupo</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row-fluid">
                                            <div class="span2" style="margin-top: 2em;"><i class="icon-user modal-icon"></i></div>
                                            <div class="span10"><?php echo $this->Form->input('group_id', array('label' => 'Grupo', 'class' => 'span12')); ?></div>                                        
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                        <button class="btn btn-primary"><i class="icon-plus"></i> Adicionar</button>
                                    </div>
                            </div>
                        <?php echo $this->Form->end(); ?>     
                        <?php echo $this->Form->create('User', array('action' => 'groups_delete/'.$user['User']['id'])); ?>
                            <div class="modal small hide fade" id="DeleteAroModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Confirmação</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Deseja realmente sair deste grupo?</p>
                                        <?php echo $this->Form->input('aro_id', array('type' => 'hidden')); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                        <button class="btn btn-danger"><i class="icon-remove"></i> Deletar</button>
                                    </div>
                            </div>
                        <?php echo $this->Form->end(); ?>     
                    </div>
                    <div class="tab-pane fade" id="permissions">
                        <div class="well">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Página</th>     
                                        <th>Permissão</th>   
                                        <th>Herança</th>  
                                         <th class="actions">Ações</th>
                                    </tr>
                                <thead>
                                <tbody>                              
                                    <?php foreach ($permissions as $permission): ?>
                                        <?php if ($permission['aco_parent_id'] == 1) { ?> <tr style="background-color: LightGray"> <?php } else { ?> <tr> <?php } ?>
                                            <td><?php echo $this->Html->link(h($permission['pageName']), array('controller'=>'pages', 'action'=>'view', $permission['page_id']), array('escape' => false)); ?>&nbsp;</td>                                            
                                            <?php if($permission['check_permission']) { ?><td class="text-success"> <i class='icon-ok'></i> </td><?php } else if (!$permission['check_permission'] && $permission['direct_permission']) { ?><td class="text-error"> <i class='icon-remove'></i> </td><?php } else { ?> <td></td> <?php } ?>&nbsp; 
                                            <td><?php if ($permission['direct_permission']) { ?> <i class='icon-flag'></i> <?php } else if ($permission['check_permission'] && !$permission['direct_permission']) {?> H <?php } ?>&nbsp;</td>
                                            <td>
                                                <strong><?php if (!$permission['direct_permission']) {
                                                            echo $this->Html->link($this->Html->tag('i', ' Add', array('class'=>'icon-check')), '#AddPermissionModal', array('escape' => false, 'data-toggle'=>'modal', 'onclick'=>'permission_add('.$permission['page_id'].')'));
                                                      } else {
                                                            echo $this->Html->tag('i', ' Add', array('class'=>'icon-check'));
                                                      }
                                                ?></strong>
                                                <strong>&nbsp; | &nbsp;<?php if ($permission['direct_permission']) {
                                                            echo $this->Html->link($this->Html->tag('i', ' Deletar', array('class'=>'icon-remove')), '#RemovePermissionModal', array('escape' => false, 'data-toggle'=>'modal', 'onclick'=>'permission_delete('.$permission['aros_aco_id'].')'));
                                                      } else {
                                                            echo $this->Html->tag('i', ' Deletar', array('class'=>'icon-remove'));
                                                      }
                                                ?></strong>                                        
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>       
                                </tbody>
                            </table>
                        </div> 
                        <?php echo $this->Form->create('User', array('action' => 'permission_add/'.$user['User']['id'])); ?>
                            <div class="modal small hide fade" id="AddPermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Permiir/Negar</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row-fluid">
                                            <div class="span2" style="margin-top: 2em;"><i class="icon-warning-sign modal-icon"></i></div>
                                            <div class="span10"><?php echo $this->Form->input('guideline', array('label' => 'Diretriz', 'class' => 'span12', 'options' => array('Permitir', 'Negar'), 'selected' => '0')); ?></div>
                                            <?php echo $this->Form->input('add_page_id', array('type' => 'hidden')); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                        <button class="btn btn-primary"><i class="icon-plus"></i> Adicionar</button>
                                    </div>
                            </div>
                        <?php echo $this->Form->end(); ?>  
                        <?php echo $this->Form->create('User', array('action' => 'permission_delete/'.$user['User']['id'])); ?>
                            <div class="modal small hide fade" id="RemovePermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Confirmação</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Deseja realmente deletar esta permissão?</p>
                                        <?php echo $this->Form->input('delete_page_id', array('type' => 'hidden')); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                        <button class="btn btn-danger"><i class="icon-remove"></i> Deletar</button>
                                    </div>
                            </div>
                        <?php echo $this->Form->end(); ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete_aro(item){
        document.getElementById("UserAroId").value = item; 
    }
    function permission_add(item){
        document.getElementById("UserAddPageId").value = item; 
        //alert(item);
    }
    function permission_delete(item){
        document.getElementById("UserDeletePageId").value = item; 
        //alert(item);
    }
</script>