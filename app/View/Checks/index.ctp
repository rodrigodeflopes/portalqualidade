<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/core/libraries/jquery_ui/widgets.min',
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/tables/datatables/extensions/natural_sort',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/checksIndex'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
<div class="page-header page-header-xs">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Fichas de verificação</span></h4>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><?php echo $this->Html->link('<i class="icon-stack3 position-left"></i> Fichas de verificação', array('action' => 'index'), array('escape' => false)); ?></li>
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
                                </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($checks as $check): ?>
                                        <tr>
                                                <td>#<?php echo h($check['Check']['id']); ?></i></td>
                                                <td><h6 class="text-semibold"><i class="icon-stack3"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo h($check['Service']['code']) . ' - ' . h($check['Service']['name']); ?></h6></td>
                                                <td>
                                                    <div class="text-semibold"><h6><?php echo h($check['Check']['name']); ?></h6></div>
                                                    <div class="text-muted"><?php echo h($check['Check']['method']); ?></div>
                                                </td>
                                        </tr>
                                <?php endforeach; ?>
                        </tbody>
                </table>
        </div>
        <!-- /task manager table -->


        <!-- Footer -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer -->

</div>
<!-- /content area -->