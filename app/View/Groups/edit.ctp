<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/forms/selects/bootstrap_select.min',
    '/assets/js/plugins/notifications/bootbox.min',
    '/assets/js/plugins/notifications/sweet_alert.min',
    '/assets/js/pages/groupsEdit'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Editar grupo</span></h4>
                        
                        <ul class="breadcrumb position-right">
                                <li><?php echo $this->Html->link('<i class="icon-users4 position-left"></i> Grupos de usuários', array('action' => 'index'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('Grupo', array('action' => 'view', $this->request->data['Group']['id']), array('escape' => false)); ?></li>
                                <li class="active">Editar grupo</li>
                        </ul>
                </div>
        </div>

        <!-- Toolbar -->
        <div class="navbar navbar-default navbar-xs">
                <ul class="nav navbar-nav visible-xs-block">
                        <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                </ul>

                <div class="navbar-collapse collapse" id="navbar-filter">
                        <ul class="nav navbar-nav element-active-slate-400">
                                <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-users4 position-left"></i> Perfil</a></li>
                                <li><a href="#access" data-toggle="tab"><i class="icon-user-lock position-left"></i> Controle de acesso</a></li>
                        </ul>
                </div>
        </div>
        <!-- /toolbar -->
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
        <?php echo $this->Session->flash(); ?> 
        <!-- User profile -->
        <div class="row">
                <div class="col-lg-3">
                        <!-- User thumbnail -->
                        <div class="thumbnail" style="height: 322px;">
                                <div class="thumb thumb-user thumb-slide">
                                        <?php echo $this->Html->image($this->request->data['Group']['image_path'], array('id' => 'imageProfile',)); ?>
                                </div>

                                <div class="caption text-center">
                                        <h6 class="text-semibold no-margin"><?php echo $this->request->data['Group']['name']; ?> 
                                        </h6>
                                </div>
                        </div>
                        <!-- /user thumbnail -->
                </div>
                <div class="col-lg-9">
                        <div class="tabbable">
                                <div class="tab-content">                                        
                                        <div class="tab-pane fade in active" id="profile">
                                                <!-- Profile info -->
                                                <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                                <h6 class="panel-title">Informações do grupo</h6>
                                                                <div class="heading-elements">
                                                                        <ul class="icons-list">
                                                                                <li><a data-action="collapse"></a></li>
                                                                                <li><a data-action="reload"></a></li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="panel-body" style="height: 256px;">
                                                                
                                                                <?php echo $this->Form->create('Group', array('type' => 'file', 'accept' => 'image/*', 'onchange' => 'loadFile(event)')); ?>
                                                                        <?php echo $this->Form->input('id'); ?>
                                                                        <div class="form-group">
                                                                                <div class="row">
                                                                                        <div class="col-md-5">
                                                                                                <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control')); ?>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                                <div class="row">
                                                                                        <div class="col-md-6">
                                                                                                <label>Nova Imagem do grupo</label>                                                                                                
                                                                                                <?php echo $this->Form->file('uploadfile', array('class' => 'file-styled')); ?> 
                                                                                                <span class="help-block">Formatos: gif, png, jpg. Máximo 2Mb</span>
                                                                                                <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $this->request->data['Group']['image_path']));  ?>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="text-right">
                                                                                <button type="submit" class="btn btn-primary">Salvar <i class="icon-arrow-right14 position-right"></i></button>
                                                                                <button type="button" class="btn btn-danger" onclick="group_delete('<?php echo $this->request->data['Group']['id']; ?>')">Excluir <i class="icon-folder-remove position-right"></i></button>
                                                                        </div>
                                                                <?php echo $this->Form->end(); ?>  
                                                        </div>
                                                </div>
                                                <!-- /profile info -->

                                        </div>
                                    
                                        <div class="tab-pane fade" id="access">

                                                <!-- Account access -->                                                
                                                <div class="row">
                                                        <div class="col-lg-7">
                                                                <div class="panel panel-flat">
                                                                        <div class="panel-heading">
                                                                                <h5 class="panel-title">Permissões</h5>
                                                                                <div class="heading-elements">
                                                                                        <ul class="icons-list">
                                                                                                <li><a data-action="collapse"></a></li>
                                                                                                <li><a data-action="reload"></a></li>
                                                                                        </ul>
                                                                                </div>
                                                                        </div>

                                                                        <table class="table datatable-basic">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>Página</th>     
                                                                                                <th>Acesso</th>   
                                                                                                <th>Tipo</th>  
                                                                                                <th class="text-center">Ações</th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <?php foreach ($permissions as $permission): ?>
                                                                                            <?php if ($permission['aco_parent_id'] == 1) { ?> <tr> <?php } else { ?> <tr> <?php } ?>
                                                                                                
                                                                                                <td><?php echo $this->Html->link(h($permission['pageName']), array('controller'=>'pages', 'action'=>'view', $permission['page_id']), array('escape' => false)); ?></td>                                            
                                                                                                
                                                                                                <?php if($permission['check_permission']) { ?>
                                                                                                    <td><span class='label label-success'> Permitido</span></td>
                                                                                                <?php } else if (!$permission['check_permission'] && $permission['direct_permission']) { ?>
                                                                                                    <td><span class='label label-danger'> Negado</span></td>
                                                                                                <?php } else { ?> 
                                                                                                    <td></td>
                                                                                                <?php } ?> 
                                                                                                
                                                                                                <?php if ($permission['direct_permission']) { ?> 
                                                                                                    <td><i class="icon-stamp"></i> Direta</td> 
                                                                                                <?php } else if ($permission['check_permission'] && !$permission['direct_permission']) {?>
                                                                                                    <td><i class="icon-clippy"></i> Herança</td> 
                                                                                                <?php } else { ?>
                                                                                                    <td></td> 
                                                                                                <?php } ?>
                                                                                                
                                                                                                <td class="text-center">
                                                                                                        <ul class="icons-list">
                                                                                                                <li class="dropdown">
                                                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                                                                <i class="icon-menu9"></i>
                                                                                                                        </a>

                                                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                                                                <?php if (!$permission['direct_permission']) { ?>
                                                                                                                                        <li><a onclick="permission_add('<?php echo $this->request->data['Group']['id']; ?>','<?php echo $permission['page_id']; ?>','1')"><i class="icon-exit"></i>Permitir</a></li>
                                                                                                                                        <li><a onclick="permission_add('<?php echo $this->request->data['Group']['id']; ?>','<?php echo $permission['page_id']; ?>','0')"><i class="icon-exit"></i>Negar</a></li>
                                                                                                                                <?php } ?>
                                                                                                                                        
                                                                                                                                <?php if ($permission['direct_permission']) { ?>
                                                                                                                                        <li><a onclick="permission_delete('<?php echo $this->request->data['Group']['id']; ?>','<?php echo $permission['aros_aco_id']; ?>')"><i class="icon-exit"></i>Excluir</a></li>
                                                                                                                                <?php } ?>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                        </ul>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php endforeach; ?>   
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                                <div class="panel panel-flat">
                                                                        <div class="panel-heading">
                                                                                <h5 class="panel-title">Membros</h5>
                                                                                <div class="heading-elements">
                                                                                        <ul class="icons-list">
                                                                                                <li><a data-action="collapse"></a></li>
                                                                                                <li><a data-action="reload"></a></li>
                                                                                        </ul>
                                                                                        <ul class="icons-list">
                                                                                                <li class="dropdown">
                                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                                                <i class="icon-menu9"></i>
                                                                                                        </a>

                                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                                                <li><a data-toggle='modal' data-target='#addUserModal'><i class=" icon-add"></i> Adicionar</a></li>
                                                                                                        </ul>
                                                                                                </li>
                                                                                        </ul>                                                                                        
                                                                                </div>
                                                                        </div>

                                                                        <table class="table datatable-basic">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th></th>     
                                                                                                <th>Nome</th>            
                                                                                                <th class="text-center">Ações</th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <?php foreach ($members as $member): ?>
                                                                                            <tr>
                                                                                                <td><?php echo $this->Html->image($member['User']['image_path'], array('class' => 'img-circle img-sm')); ?></td>
                                                                                                <td><?php echo $this->Html->link(h($member['User']['name']), array('controller'=>'users', 'action'=>'view', $member['User']['id']), array('escape' => false)); ?></td>    
                                                                                                <td class="text-center">
                                                                                                        <ul class="icons-list">
                                                                                                                <li class="dropdown">
                                                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                                                                <i class="icon-menu9"></i>
                                                                                                                        </a>

                                                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                                                                <li><a onclick="member_delete('<?php echo $this->request->data['Group']['id']; ?>','<?php echo $member['Aro']['id']; ?>')"><i class="icon-exit"></i>Excluir</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                        </ul>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php endforeach; ?>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- /Account access -->

                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <!-- /user profile -->

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->

<!-- Add group modal -->
<div id="addUserModal" class="modal fade">
        <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <?php echo $this->Form->create('Group', array('action' => 'members_add/'.$this->request['Groups']['id'])); ?>
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="icon-add position-left"></i>&nbsp;Novo Membro</h5>
                        </div>

                        <div class="modal-body">                            
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-12">
                                                        <?php echo $this->Form->input('user_id', array('label' => 'Grupos', 'class' => 'bootstrap-select form-control')); ?>
                                                </div>
                                        </div>
                                </div>                            
                        </div>

                        <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                <button class="btn btn-primary">Salvar <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    <?php echo $this->Form->end(); ?>    
                </div>
        </div>
</div>
<!-- /Add group modal -->