<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/plugins/forms/selects/bootstrap_select.min',
    '/assets/js/plugins/notifications/bootbox.min',
    '/assets/js/plugins/notifications/sweet_alert.min',
    '/assets/js/pages/usersEdit'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Editar usuário</span></h4>
                        
                        <ul class="breadcrumb position-right">
                                <li><?php echo $this->Html->link('<i class="icon-users position-left"></i> Usuários', array('action' => 'index'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('Usuário', array('action' => 'view', $this->request->data['User']['id']), array('escape' => false)); ?></li>
                                <li class="active">Editar usuário</li>
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
                                <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-user position-left"></i> Perfil</a></li>
                                <li><a href="#access" data-toggle="tab"><i class="icon-user-lock position-left"></i> Controle de acesso</a></li>
                                <!--<li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Config.</a></li>-->
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
                                        <?php echo $this->Html->image($this->request->data['User']['image_path'], array('id' => 'imageProfile',)); ?>
                                </div>

                                <div class="caption text-center">
                                        <h6 class="text-semibold no-margin"><?php echo $this->request->data['User']['name']; ?> 
                                            <small class="display-block"><?php echo $this->request->data['User']['sector']; ?></small>
                                            <small class="display-block" style="margin-top: 10px;"><i class="icon-phone2"></i> <?php echo $this->request->data['User']['phone']; ?></small>
                                        </h6>
                                </div>
                        </div>
                        <!-- /user thumbnail -->


                        <!-- Navigation -->
                        <div class="panel panel-flat">
                                <div class="panel-heading">
                                        <h6 class="panel-title">Dados</h6>
                                </div>

                                <div class="list-group list-group-borderless no-padding-top">
                                        <a href="#" class="list-group-item"><i class=" icon-price-tag3"></i> Status <span class="<?php echo $this->request->data['UserStatus']['cssClass']; ?> pull-right"><?php echo $this->request->data['UserStatus']['name']; ?></span></a>
                                        <a href="#" class="list-group-item"><i class="icon-laptop"></i> Último acesso <span class="pull-right"><?php echo h($this->Time->format('d/m/Y H:i', $this->request->data['User']['modified'])); ?></span></a>
                                </div>
                        </div>
                        <!-- /navigation -->
                </div>
                <div class="col-lg-9">
                        <div class="tabbable">
                                <div class="tab-content">                                        
                                        <div class="tab-pane fade in active" id="profile">
                                                <!-- Profile info -->
                                                <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                                <h6 class="panel-title">Informações de Perfil</h6>
                                                                <div class="heading-elements">
                                                                        <ul class="icons-list">
                                                                                <li><a data-action="collapse"></a></li>
                                                                                <li><a data-action="reload"></a></li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="panel-body" style="height: 424px;">
                                                                <div class="alert alert-warning alert-styled-left">
                                                                        <span class="text-semibold">Atenção!</span> Se editado seu próprio perfil você será convidado a efetuar novo login.
                                                                </div>
                                                                
                                                                <?php echo $this->Form->create('User', array('type' => 'file', 'accept' => 'image/*', 'onchange' => 'loadFile(event)')); ?>
                                                                        <?php echo $this->Form->input('id'); ?>
                                                                        <div class="form-group">
                                                                                <div class="row">
                                                                                        <div class="col-md-5">
                                                                                                <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control')); ?>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                                <?php echo $this->Form->input('sector', array('label' => 'Setor', 'class' => 'form-control')); ?>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                                <?php echo $this->Form->input('phone', array('label' => 'Telefone', 'class' => 'form-control')); ?>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                                <div class="row">
                                                                                        <div class="col-md-6">
                                                                                                <?php echo $this->Form->input('email', array('label' => 'Login / E-mail', 'class' => 'form-control')); ?>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                                <?php echo $this->Form->input('new_password', array('type' => 'password', 'label' => 'Nova senha', 'placeholder' => 'password', 'class' => 'form-control')); ?>
                                                                                        </div>
                                                                                        <div class="col-md-2">  
                                                                                                <?php echo $this->Form->input('user_status_id', array('label' => 'Status', 'class' => 'bootstrap-select form-control')); ?> 
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                                <div class="row">
                                                                                        <div class="col-md-6">
                                                                                                <label>Nova Imagem de Perfil</label>                                                                                                
                                                                                                <?php echo $this->Form->file('uploadfile', array('class' => 'file-styled')); ?> 
                                                                                                <span class="help-block">Formatos: gif, png, jpg. Máximo 2Mb</span>
                                                                                                <?php echo $this->Form->input('image_path', array('type' => 'hidden', 'value' => $this->request->data['User']['image_path']));  ?>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="text-right">
                                                                                <button type="submit" class="btn btn-primary">Salvar <i class="icon-arrow-right14 position-right"></i></button>
                                                                                <button type="button" class="btn btn-danger" onclick="user_delete('<?php echo $this->request->data['User']['id']; ?>')">Excluir <i class="icon-folder-remove position-right"></i></button>
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
                                                                                                                                        <li><a onclick="permission_add('<?php echo $this->request->data['User']['id']; ?>','<?php echo $permission['page_id']; ?>','1')"><i class="icon-exit"></i>Permitir</a></li>
                                                                                                                                        <li><a onclick="permission_add('<?php echo $this->request->data['User']['id']; ?>','<?php echo $permission['page_id']; ?>','0')"><i class="icon-exit"></i>Negar</a></li>
                                                                                                                                <?php } ?>
                                                                                                                                        
                                                                                                                                <?php if ($permission['direct_permission']) { ?>
                                                                                                                                        <li><a onclick="permission_delete('<?php echo $this->request->data['User']['id']; ?>','<?php echo $permission['aros_aco_id']; ?>')"><i class="icon-exit"></i>Excluir</a></li>
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
                                                                                <h5 class="panel-title">Membro de (Grupos)</h5>
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
                                                                                                                <li><a data-toggle='modal' data-target='#addGroupModal'><i class=" icon-add"></i> Adicionar</a></li>
                                                                                                        </ul>
                                                                                                </li>
                                                                                        </ul>                                                                                        
                                                                                </div>
                                                                        </div>

                                                                        <table class="table datatable-basic">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th></th>     
                                                                                                <th>Grupo</th>            
                                                                                                <th class="text-center">Ações</th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <?php foreach ($belongs as $belong): ?>
                                                                                            <tr>
                                                                                                <td><?php echo $this->Html->image($belong['parent']['image_path'], array('class' => 'img-circle img-sm')); ?></td>
                                                                                                <td><?php echo $this->Html->link(h($belong['parent']['name']), array('controller'=>'groups', 'action'=>'view', $belong['Aro']['parent_id']), array('escape' => false)); ?>&nbsp;</td>    
                                                                                                <td class="text-center">
                                                                                                        <ul class="icons-list">
                                                                                                                <li class="dropdown">
                                                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                                                                <i class="icon-menu9"></i>
                                                                                                                        </a>

                                                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                                                                <li><a onclick="group_delete('<?php echo $this->request->data['User']['id']; ?>','<?php echo $belong['Aro']['id']; ?>')"><i class="icon-exit"></i>Sair</a></li>
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

                                        <div class="tab-pane fade" id="settings">

                                                <!-- Account settings -->
                                                <div class="panel panel-flat">
                                                        <div class="panel-heading">
                                                                <h6 class="panel-title">Account settings</h6>
                                                                <div class="heading-elements">
                                                                        <ul class="icons-list">
                                                                                <li><a data-action="collapse"></a></li>
                                                                                <li><a data-action="reload"></a></li>
                                                                                <li><a data-action="close"></a></li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="panel-body" style="height: 424px;">
                                                                <form action="#">
                                                                        <div class="form-group">
                                                                                <div class="row">
                                                                                        <div class="col-md-6">
                                                                                                <label>Profile visibility</label>

                                                                                                <div class="radio">
                                                                                                        <label>
                                                                                                                <input type="radio" name="visibility" class="styled" checked="checked">
                                                                                                                Visible to everyone
                                                                                                        </label>
                                                                                                </div>

                                                                                                <div class="radio">
                                                                                                        <label>
                                                                                                                <input type="radio" name="visibility" class="styled">
                                                                                                                Visible to friends only
                                                                                                        </label>
                                                                                                </div>

                                                                                                <div class="radio">
                                                                                                        <label>
                                                                                                                <input type="radio" name="visibility" class="styled">
                                                                                                                Visible to my connections only
                                                                                                        </label>
                                                                                                </div>

                                                                                                <div class="radio">
                                                                                                        <label>
                                                                                                                <input type="radio" name="visibility" class="styled">
                                                                                                                Visible to my colleagues only
                                                                                                        </label>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="col-md-6">
                                                                                                <label>Notifications</label>

                                                                                                <div class="checkbox">
                                                                                                        <label>
                                                                                                                <input type="checkbox" class="styled" checked="checked">
                                                                                                                Password expiration notification
                                                                                                        </label>
                                                                                                </div>

                                                                                                <div class="checkbox">
                                                                                                        <label>
                                                                                                                <input type="checkbox" class="styled" checked="checked">
                                                                                                                New message notification
                                                                                                        </label>
                                                                                                </div>

                                                                                                <div class="checkbox">
                                                                                                        <label>
                                                                                                                <input type="checkbox" class="styled" checked="checked">
                                                                                                                New task notification
                                                                                                        </label>
                                                                                                </div>

                                                                                                <div class="checkbox">
                                                                                                        <label>
                                                                                                                <input type="checkbox" class="styled">
                                                                                                                New contact request notification
                                                                                                        </label>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>

                                                                        <div class="text-right">
                                                                                <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                                                        </div>
                                                                </form>
                                                        </div>
                                                </div>
                                                <!-- /account settings -->

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
<div id="addGroupModal" class="modal fade">
        <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <?php echo $this->Form->create('User', array('action' => 'groups_add/'.$this->request['User']['id'])); ?>
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="icon-add position-left"></i>&nbsp;Novo Grupo</h5>
                        </div>

                        <div class="modal-body">                            
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-12">
                                                        <?php echo $this->Form->input('group_id', array('label' => 'Grupos', 'class' => 'bootstrap-select form-control')); ?>
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
