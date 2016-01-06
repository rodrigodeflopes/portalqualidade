<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/core/libraries/jquery_ui/widgets.min',
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/tables/datatables/extensions/natural_sort',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/tasks_list'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Fichas de verificação</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> Fichas de verificação</a></li>
                </ul>
        </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

        <!-- Task manager table -->
        <div class="panel panel-white">
                <div class="panel-heading">
                        <h6 class="panel-title">Fichas de verificação</h6>
                        <div class="heading-elements">
                                <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                </ul>
                        </div>
                </div>

                <table class="table tasks-list table-striped">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Serviço</th>
                                        <th>Verificação</th>
                                        <th>Criado</th>
                                        <th>Modificado</th>
                                        <th class="text-center">Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($checks as $check): ?>
                                        <tr>
                                                <td>#<?php echo h($check['Check']['id']); ?></i></td>
                                                <td><h6 class="text-semibold"><i class="icon-stack3"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo h($check['Service']['code']) . ' - ' . h($check['Service']['name']); ?></h6></td>
                                                <td>
                                                    <div class="text-semibold"><h6><a><?php echo h($check['Check']['name']); ?></a></h6></div>
                                                    <div class="text-muted"><?php echo h($check['Check']['method']); ?></div>
                                                </td>
                                                <td><?php echo h($this->Time->format('d/m/Y H:i:s', $check['Check']['created'])); ?></td>
                                                        <td><?php echo h($this->Time->format('d/m/Y H:i:s', $check['Check']['modified'])); ?></td>
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
        <!-- /task manager table -->


        <!-- Footer -->
        <div class="footer text-muted">
                &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->

</div>
<!-- /content area -->