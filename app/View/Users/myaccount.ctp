<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/forms/styling/uniform.min',
    '/assets/js/pages/usersMyAccount'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Minha conta</span></h4>
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
                                        <a href="#" class="list-group-item"><i class="icon-laptop"></i> Último acesso <span class="pull-right"><?php echo h($this->Time->format('d/m/Y H:i', $this->request->data['User']['last_access'])); ?></span></a>
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
                                                                        <span class="text-semibold">Atenção!</span> Após salvar você será convidado a efetuar novo login.
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
                                                                                        <div class="col-md-6">
                                                                                                <?php echo $this->Form->input('new_password', array('type' => 'password', 'label' => 'Nova senha', 'placeholder' => 'password', 'class' => 'form-control')); ?>
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
                                                                        </div>
                                                                <?php echo $this->Form->end(); ?>      
                                                        </div>
                                                </div>
                                                <!-- /profile info -->

                                        </div>

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
