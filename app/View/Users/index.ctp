<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/datatables_basic.js'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
        <div class="page-header page-header-xs">
                <div class="page-header-content">
                        <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Usuários</span></h4>
                        </div>

                        <div class="heading-elements">
                                <div class="heading-btn-group">
                                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-add text-primary"></i><span>Adicionar</span></a>
                                </div>
                        </div>
                </div>

                <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icon-home2 position-left"></i> Usuários</a></li>
                        </ul>
                </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

                <!-- Basic datatable -->
                <div class="panel panel-flat">
                        <div class="panel-heading">
                                <h5 class="panel-title">Lista de usuários</h5>
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
                                                <th>Email</th>
                                                <th>Criado</th>
                                                <th>Modificado</th>
                                                <th>Status</th>
                                                <th class="text-center">Ações</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($users as $user): ?>
                                                <tr>
                                                        <td><?php echo $this->Html->image($user['User']['image_path'], array('class' => 'img-circle img-sm')); ?></td>
                                                        <td><?php echo $this->Html->link(h($user['User']['name']), array('action'=>'view', $user['User']['id']), array('escape' => false)); ?></td>
                                                        <td><?php echo h($user['User']['email']); ?></td>
                                                        <td><?php echo h($this->Time->format('d/m/Y H:i:s', $user['User']['created'])); ?></td>
                                                        <td><?php echo h($this->Time->format('d/m/Y H:i:s', $user['User']['modified'])); ?></td>
                                                        <td><span class="label label-success">Active</span></td>
                                                        <td class="text-center">
                                                                <ul class="icons-list">
                                                                        <li class="dropdown">
                                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                        <i class="icon-menu9"></i>
                                                                                </a>

                                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                                        <li><a href="#"><i class=" icon-pencil5"></i> Editar</a></li>
                                                                                        <li><a href="#"><i class="icon-folder-remove"></i> Excluir</a></li>
                                                                                </ul>
                                                                        </li>
                                                                </ul>
                                                        </td>
                                                </tr>
                                        <?php endforeach; ?>
                                </tbody>
                        </table>
                </div>
                <!-- /basic datatable -->

                <!-- Footer -->
                <?php echo $this->element('footer'); ?>
                <!-- /footer -->

        </div>
        <!-- /content area -->

</div>
<!-- /main content -->