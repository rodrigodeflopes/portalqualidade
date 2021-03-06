<!-- Theme JS files -->

<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Usuário</span></h4>

                        <ul class="breadcrumb position-right">
                                <li><?php echo $this->Html->link('<i class="icon-users position-left"></i> Usuários', array('action' => 'index'), array('escape' => false)); ?></li>
                                <li class="active">Usuário</li>
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
                                        <?php echo $this->Html->image($user['User']['image_path']); ?>
                                </div>

                                <div class="caption text-center">
                                        <h6 class="text-semibold no-margin"><?php echo $user['User']['name']; ?> 
                                            <small class="display-block"><?php echo $user['User']['sector']; ?></small>
                                            <small class="display-block" style="margin-top: 10px;"><i class="icon-phone2"></i> <?php echo $user['User']['phone']; ?></small>
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
                                                                <h6 class="panel-title">Informações de Perfil</h6>
                                                                <div class="heading-elements">
                                                                        <ul class="icons-list">
                                                                                <li><a data-action="collapse"></a></li>
                                                                                <li><a data-action="reload"></a></li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="panel-body" style="height: 256px;">   
                                                                        <div class="form-group">
                                                                                <label class="control-label col-lg-2">Nome:</label> <?php echo $user['User']['name']; ?>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                                <label class="control-label col-lg-2">Setor:</label> <?php echo $user['User']['sector']; ?>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                                <label class="control-label col-lg-2">Telefone:</label> <?php echo $user['User']['phone']; ?>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                            <label class="control-label col-lg-2"><i class=" icon-price-tag3"></i>&nbsp; Status:</label> <span class="<?php echo $user['UserStatus']['cssClass']; ?>"><?php echo $user['UserStatus']['name']; ?></span>
                                                                        </div>
                                                            
                                                                        <div class="form-group">
                                                                            <label class="control-label col-lg-2"><i class=" icon-laptop"></i>&nbsp; Último acesso:</label> <span><?php echo h($this->Time->format('d/m/Y H:i', $user['User']['last_access'])); ?></span>
                                                                        </div>
                                                                        
                                                                        <div class="text-right">
                                                                                <?php echo $this->Html->link('Editar <i class="icon-pencil5 position-right"></i>', array('action' => 'edit', $user['User']['id']), array('escape' => false, 'class' => 'btn btn-primary')); ?>
                                                                        </div>
                                                                
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

                                                        <div class="panel-body" style="height: 256px;">
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
