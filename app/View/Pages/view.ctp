<!-- Theme JS files -->

<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">cesso controlado</span></h4>

                        <ul class="breadcrumb position-right">
                                <li><?php echo $this->Html->link('<i class="icon-stackoverflow position-left"></i> Acessos controlados', array('action' => 'index'), array('escape' => false)); ?></li>
                                <li class="active">Acesso controlado</li>
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
                                <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-stackoverflow position-left"></i> Perfil</a></li>
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
        <!-- Page profile -->        
        <div class="tabbable">
                <div class="tab-content">                                        
                        <div class="tab-pane fade in active" id="profile">
                                <!-- Profile info -->
                                <div class="panel panel-flat">
                                        <div class="panel-heading">
                                                <h6 class="panel-title">Informações do acesso controlado</h6>
                                                <div class="heading-elements">
                                                        <ul class="icons-list">
                                                                <li><a data-action="collapse"></a></li>
                                                                <li><a data-action="reload"></a></li>
                                                        </ul>
                                                </div>
                                        </div>

                                        <div class="panel-body">   
                                                        <div class="form-group">
                                                                <label class="control-label col-lg-2">Nome:</label> <?php echo $page['Page']['name']; ?>
                                                        </div>
                                            
                                                        <div class="form-group">
                                                                <label class="control-label col-lg-2">Visível:</label> <?php if($page['Page']['enable']){ echo 'Sim';}else{echo 'Não';} ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-lg-2"><i class=" icon-laptop"></i>&nbsp; Criado:</label> <span><?php echo h($this->Time->format('d/m/Y H:i', $page['Page']['created'])); ?></span>
                                                        </div>

                                                        <div class="text-right">
                                                                <?php echo $this->Html->link('Editar <i class="icon-pencil5 position-right"></i>', array('action' => 'edit', $page['Page']['id']), array('escape' => false, 'class' => 'btn btn-primary')); ?>
                                                        </div>

                                        </div>
                                </div>
                                <!-- /profile info -->
                        </div>
                        <div class="tab-pane fade" id="access">
                                <!-- Allow info -->
                                <div class="panel panel-flat">
                                        <div class="panel-heading">
                                                <h6 class="panel-title">Acesso permitido à <?php echo $page['Page']['name']; ?></h6>
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
                                                                <th></th>
                                                                <th>Nome</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php foreach ($usersGroups as $usersGroup): ?>
                                                                <tr>
                                                                        <td><?php echo $this->Html->image($usersGroup['image_path'], array('class' => 'img-circle img-sm')); ?></td>
                                                                        <td><?php echo $this->Html->link(h($usersGroup['name']), array('controller'=> $usersGroup['controller'] ,'action'=>'view', $usersGroup['id']), array('escape' => false)); ?></td>
                                                                </tr>
                                                        <?php endforeach; ?>
                                                </tbody>
                                        </table>
                                </div>
                                <!-- /Allow info -->


                        </div>
                </div>
        </div>
        <!-- /Page profile -->

        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->