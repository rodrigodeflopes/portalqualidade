<!DOCTYPE html>
<html lang="en">
        <head>
                <?php echo $this->Html->charset(); ?>
                <!-- <meta charset="utf-8"> >

                <?php echo $this->Html->meta(array('content' => 'IE=edge,chrome=1', 'http-equiv' => 'X-UA-Compatible')); ?>
                <!-- <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"> -->

                <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

                <?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
                <?php echo $this->Html->meta(array('name' => 'description', 'content' => '')); ?>
                <?php echo $this->Html->meta(array('name' => 'author', 'content' => '')); ?>

                <!-- Global stylesheets -->
                <?php echo $this->Html->css(array(
                    'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
                    '/assets/css/icons/icomoon/styles', 
                    '/assets/css/bootstrap',
                    '/assets/css/core',
                    '/assets/css/components',
                    '/assets/css/colors'
                ));  ?>

                <!-- Core JS files -->
                <?php echo $this->Html->script(array(
                    '/assets/js/plugins/loaders/pace.min',
                    '/assets/js/core/libraries/jquery.min',
                    '/assets/js/core/libraries/bootstrap.min',
                    '/assets/js/plugins/loaders/blockui.min'
               )); ?>

                <!-- Theme JS files -->
                <?php echo $this->Html->script(array(
                    '/assets/js/core/app'
               )); ?>

        </head>
        
        <body>
                <!-- Main navbar -->
                <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                                <a class="nav-brand" href="/portalqualidade/enterprises/index"><img src="/portalqualidade/img/qualitab-nav.png" alt="" width="130px" style="margin-top: 10px; margin-left: 14px"></a>
                                <a class="nav-brand" href="http://www.apisengenharia.com/" target="_blank"><img src="/portalqualidade/img/apis-nav.png" alt="" width="80px" style="margin-top: 10px; margin-left: 14px"></a>

                                <ul class="nav navbar-nav pull-right visible-xs-block">
                                        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                                        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                                </ul>
                        </div>

                        <div class="navbar-collapse collapse" id="navbar-mobile">
                                <ul class="nav navbar-nav">
                                        <li>
                                                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                                                        <i class="icon-paragraph-justify3"></i>
                                                </a>
                                        </li>
                                </ul>

                                <ul class="nav navbar-nav navbar-right">
                                        <li class="dropdown dropdown-user">
                                                <a class="dropdown-toggle" data-toggle="dropdown">
                                                        <?php echo $this->Html->image($this->Session->read('Auth.User.image_path')); ?>
                                                        <span><?php echo $this->Session->read('Auth.User.name'); ?></span>
                                                        <i class="caret"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><?php echo $this->Html->link('<i class="icon-user-plus"></i> Minha conta', array('controller' => 'users', 'action' => 'myaccount', $this->Session->read('Auth.User.id')), array('escape' => false)); ?></li>
                                                        <li class="divider"></li>
                                                        <li><?php echo $this->Html->link('<i class="icon-switch2"></i> Logout', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
                                                </ul>
                                        </li>
                                </ul>
                        </div>
                </div>
                <!-- /main navbar -->


                <!-- Page container -->
                <div class="page-container">

                        <!-- Page content -->
                        <div class="page-content">

                                <!-- Main sidebar -->
                                <div class="sidebar sidebar-main">
                                        <div class="sidebar-content">

                                                <!-- User menu -->
                                                <div class="sidebar-user">
                                                        <div class="category-content">
                                                                <div class="media">
                                                                        <?php if($this->Session->read('enterpriseId')){ ?>
                                                                                <?php echo $this->Html->link($this->Html->image($this->Session->read('enterpriseImagePath'),array('class' => 'img-sm')), array('controller' => 'enterprises', 'action' => 'view', $this->Session->read('enterpriseId')), array('escape' => false, 'class' => 'media-left')); ?>
                                                                                <div class="media-body">
                                                                                        <h6 class="media-heading text-semibold"><?php echo $this->Session->read('enterpriseName'); ?></h6>
                                                                                        <div class="text-size-mini text-muted">
                                                                                            <i class="icon-pin text-size-small"></i> &nbsp;<?php echo $this->Session->read('enterpriseLocation'); ?>
                                                                                        </div>
                                                                                </div>
                                                                        <?php }else{ ?>
                                                                                <?php echo $this->Html->link('<i class="icon-alert text-danger" style="margin-top: 10px; font-size:26px;"></i>', array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false, 'class' => 'media-left')); ?>
                                                                                <div class="media-body">
                                                                                        <h6 class="media-heading text-semibold">Selecione uma obra...</h6>
                                                                                        <div class="text-size-mini text-muted">
                                                                                                Menu: Principal / Obras
                                                                                        </div>
                                                                                </div>
                                                                        <?php } ?>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- /user menu -->


                                                <!-- Main navigation -->
                                                <div class="sidebar-category sidebar-category-visible">
                                                        <div class="category-content no-padding">
                                                                <ul class="navigation navigation-main navigation-accordion">
                                                                    
                                                                        <?php if(!$this->Session->read('enterpriseId')){ $menuClass = 'disabled'; }else{ $menuClass = ''; } ?>

                                                                        <!-- Principal -->
                                                                        <li class="navigation-header"><span>Principal</span> <i class="icon-menu" title="Main pages"></i></li>
                                                                            <li><?php echo $this->Html->link('<i class="icon-home4"></i> <span>Obras</span>', array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-stack3"></i> <span>FVS</span>', array('controller' => 'checks', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-filter3"></i> <span>Filtro</span>', array('controller' => 'items', 'action' => 'research'), array('escape' => false)); ?></li>                                                                            
                                                                            <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-upload"></i> <span>Exportar</span>', array('controller' => 'items', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-download"></i> <span>Importar</span>', array('controller' => 'items', 'action' => 'import'), array('escape' => false)); ?></li>
                                                                            <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-transmission"></i> <span>Histórico</span>', array('controller' => 'transfers', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                        <!-- /Principal -->
                                                                        
                                                                        <!-- Sistema -->
                                                                        <li class="navigation-header"><span>Sistema</span> <i class="icon-menu" title="Forms"></i></li>   
                                                                            <li><?php echo $this->Html->link('<i class="icon-people"></i> <span>Usuários</span>', array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <li><?php echo $this->Html->link('<i class="icon-tablet"></i> <span>Dispositivos</span>', array('controller' => 'devices', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                        <!-- /Sistema -->

                                                                </ul>
                                                        </div>
                                                </div>
                                                <!-- /main navigation -->

                                        </div>
                                </div>
                                <!-- /main sidebar -->


                                <!-- Main content -->
                                <div class="content-wrapper">
                                        <?php echo $this->Session->flash(); ?>
                                        <?php echo $this->Session->flash('auth'); ?>
                                        <?php echo $this->fetch('content'); ?>
                                </div>
                                <!-- /main content -->

                        </div>
                        <!-- /page content -->

                </div>
                <!-- /page container -->

        </body>
        
</html>     