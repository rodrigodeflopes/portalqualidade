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
                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Grupos de usuários</span></h4>
                        </div>

                        <div class="heading-elements">
                                <div class="heading-btn-group">
                                        <a href="groups/add" class="btn btn-link btn-float has-text"><i class="icon-add text-primary"></i><span>Adicionar</span></a>
                                </div>
                        </div>
                </div>

                <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                                <li><?php echo $this->Html->link('<i class="icon-users4 position-left"></i> Grupos de usuários', array('action' => 'index'), array('escape' => false)); ?></li>
                        </ul>
                </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
                <?php echo $this->Session->flash(); ?> 
                <!-- Basic datatable -->
                <div class="panel panel-flat">
                        <div class="panel-heading">
                                <h5 class="panel-title">Lista de grupos</h5>
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
                                                <th>Criado</th>
                                                <th>Modificado</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($groups as $group): ?>
                                                <tr>
                                                        <td><?php echo $this->Html->image($group['Group']['image_path'], array('class' => 'img-circle img-sm')); ?></td>
                                                        <td><?php echo $this->Html->link(h($group['Group']['name']), array('action'=>'view', $group['Group']['id']), array('escape' => false)); ?></td>
                                                        <td><?php echo h($this->Time->format('d/m/Y H:i:s', $group['Group']['created'])); ?></td>
                                                        <td><?php echo h($this->Time->format('d/m/Y H:i:s', $group['Group']['modified'])); ?></td>
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