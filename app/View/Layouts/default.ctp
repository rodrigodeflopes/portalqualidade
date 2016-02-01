<!DOCTYPE html>
<html lang="en">
        <head>
                <?php echo $this->Html->charset(); ?>
                <!-- <meta charset="utf-8"> >

                <?php echo $this->Html->meta(array('content' => 'IE=edge,chrome=1', 'http-equiv' => 'X-UA-Compatible')); ?>
                <!-- <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"> -->

                <title>QualiTab</title>
                <link rel="shortcut icon" href="<?php echo Router::url('/', true); ?>/img/favicon.gif" />

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
                                <?php echo $this->Html->link($this->Html->image('qualitab-nav.png', array('width' => '130px', 'style' => 'margin-top: 10px; margin-left: 14px')), array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false, 'class' => 'nav-brand')); ?>
                                <?php echo $this->Html->link($this->Html->image('apis-nav.png', array('width' => '80px', 'style' => 'margin-top: 10px; margin-left: 14px')), 'http://www.apisengenharia.com', array('escape' => false, 'class' => 'nav-brand', 'target' => '_blank')); ?>

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

<?php 
//debug($accesses); 
//debug( Set::matches('/Permission[pageId=16]', $accesses) ); 
?>
                                                <!-- Main navigation -->
                                                <div class="sidebar-category sidebar-category-visible">
                                                        <div class="category-content no-padding">
                                                                <ul class="navigation navigation-main navigation-accordion">
                                                                    
                                                                        <?php if(!$this->Session->read('enterpriseId')){ $menuClass = 'disabled'; }else{ $menuClass = ''; } ?>

                                                                        <li><?php echo $this->Html->link('<i class="icon-home4"></i> <span>Obras</span>', array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                    
                                                                        <!-- Principal -->
                                                                        <li class="navigation-header"><span>Principal</span> <i class="icon-menu" title="Main pages"></i></li>
                                                                            <!-- FVS -->
                                                                            <?php if(Set::matches('/Permission[pageId=5]', $accesses)){ ?>
                                                                                    <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-stack3"></i> <span>FVS</span>', array('controller' => 'checks', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-stack3"></i> <span>FVS</span></a></li>
                                                                            <?php } ?>
                                                                              
                                                                            <!-- Filtro -->
                                                                            <?php if(Set::matches('/Permission[pageId=10]', $accesses)){ ?>
                                                                                    <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-filter3"></i> <span>Filtro</span>', array('controller' => 'items', 'action' => 'research'), array('escape' => false)); ?></li> 
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-filter3"></i> <span>Filtro</span></a></li>
                                                                            <?php } ?>
                                                                             
                                                                            <!-- Terminalidades -->
                                                                            <?php if(Set::matches('/Permission[pageId=12]', $accesses)){ ?>
                                                                                    <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class=" icon-office"></i> <span>Terminalidades</span>', array('controller' => 'items', 'action' => 'overview'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class=" icon-office"></i> <span>Terminalidades</span></a></li>
                                                                            <?php } ?>
                                                                        <!-- /Principal -->
                                                                        
                                                                        <!-- Sincronizar -->
                                                                        <li class="navigation-header"><span>Sincronizar</span> <i class="icon-menu" title="Main pages"></i></li> 
                                                                            <!-- Exportar -->
                                                                            <?php if(Set::matches('/Permission[pageId=9]', $accesses)){ ?>
                                                                                    <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-upload"></i> <span>Exportar</span>', array('controller' => 'items', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-upload"></i> <span>Exportar</span></a></li>
                                                                            <?php } ?>
                                                                              
                                                                            <!-- Importar -->
                                                                            <?php if(Set::matches('/Permission[pageId=11]', $accesses)){ ?>
                                                                                    <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-download"></i> <span>Importar</span>', array('controller' => 'items', 'action' => 'import'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-download"></i> <span>Importar</span></a></li>
                                                                            <?php } ?>
                                                                             
                                                                            <!-- Histórico -->
                                                                            <?php if(Set::matches('/Permission[pageId=17]', $accesses)){ ?>
                                                                                    <li class="<?php echo $menuClass; ?>"><?php echo $this->Html->link('<i class="icon-transmission"></i> <span>Histórico</span>', array('controller' => 'transfers', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-transmission"></i> <span>Histórico</span></a></li>
                                                                            <?php } ?>
                                                                        <!-- /Sincronizar -->
                                                                        
                                                                        <!-- Sistema -->
                                                                        <li class="navigation-header"><span>Sistema</span> <i class="icon-menu" title="Forms"></i></li>  
                                                                            <!-- Usuários -->
                                                                            <?php if(Set::matches('/Permission[pageId=13]', $accesses)){ ?>
                                                                                    <li><?php echo $this->Html->link('<i class="icon-users"></i> <span>Usuários</span>', array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-users"></i> <span>Usuários</span></a></li>
                                                                            <?php } ?>
                                                                              
                                                                            <!-- Grupos Usuários -->
                                                                            <?php if(Set::matches('/Permission[pageId=15]', $accesses)){ ?>
                                                                                    <li><?php echo $this->Html->link('<i class="icon-users4"></i> <span>Grupos Usuários</span>', array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php } ?>
                                                                             
                                                                            <!-- Acessos Controlados -->
                                                                            <?php if(Set::matches('/Permission[pageId=14]', $accesses)){ ?>
                                                                                    <li><?php echo $this->Html->link('<i class="icon-stackoverflow"></i> <span>Acessos Controlados</span>', array('controller' => 'pages', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php } ?>
                                                                                    
                                                                            <!-- Dispositivos -->
                                                                            <?php if(Set::matches('/Permission[pageId=3]', $accesses)){ ?>
                                                                                    <li><?php echo $this->Html->link('<i class="icon-tablet"></i> <span>Dispositivos</span>', array('controller' => 'devices', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php }else{ ?>
                                                                                    <li class="disabled"><a><i class="icon-tablet"></i> <span>Dispositivos</span></a></li>
                                                                            <?php } ?>
                                                                              
                                                                            <!-- Updates -->
                                                                            <?php if(Set::matches('/Permission[pageId=16]', $accesses)){ ?>
                                                                                   <li><?php echo $this->Html->link('<i class="icon-width"></i> <span>Updates</span>', array('controller' => 'appUpdates', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <?php } ?>
                                                                        <!-- /Sistema -->
                                                                        
                                                                        
                                                                        <!-- Desenvolvimento -->
                                                                        <li class="navigation-header" style="margin-top: 50px;"><span>Em Desenvolvimento</span> <i class="icon-menu" title="Forms"></i></li>   
                                                                            <li class="disabled"><?php echo $this->Html->link('<i class="icon-stack4"></i> <span>Aprovações</span>', array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <li class="disabled"><?php echo $this->Html->link('<i class="icon-file-eye2"></i> <span>Re-inspeções</span>', array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                            <li class="disabled"><?php echo $this->Html->link('<i class="icon-folder-open"></i> <span>Documentos8</span>', array('controller' => 'enterprises', 'action' => 'index'), array('escape' => false)); ?></li>
                                                                        <!-- /Desenvolvimento -->

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