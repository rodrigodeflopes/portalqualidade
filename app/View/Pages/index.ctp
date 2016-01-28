<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/pagesIndex'
)); ?>
<!-- /Theme JS files -->

<!-- Page header -->
        <div class="page-header page-header-xs">
                <div class="page-header-content">
                        <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Acessos controlados</span></h4>
                        </div>
                </div>

                <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                                <li><?php echo $this->Html->link('<i class="icon-stackoverflow position-left"></i> Acessos controlados', array('action' => 'index'), array('escape' => false)); ?></li>
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
                                <h5 class="panel-title">Lista de acessos</h5>
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
                                                <th>id</th>
                                                <th>Controller/Action</th>
                                                <th>Nome do Acesso</th>             
                                                <th>Visível</th>             
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($pages as $page): ?>
                                                <?php if ($page['Aco']['parent_id'] == 1) { ?> <tr style="background-color: LightGray;"> <?php } else { ?> <tr> <?php } ?>
                                                        <td><?php echo $page['Aco']['id']; ?></td>
                                                        <td><?php echo h($page['Aco']['alias']); ?></td>   
                                                        <?php if (!$page['Page']['name']) { ?> 
                                                                <td><?php echo $this->Html->link('<span class="label label-danger"><i class="icon-add"></i> Adicionar um nome para este acesso</span>', array('action' => 'add', $page['Aco']['id']), array('escape' => false)); ?></td>
                                                        <?php } else { ?> 
                                                                <td><?php if($page['Page']['id']){ echo $this->Html->link(h($page['Page']['name']), array('action'=>'view', $page['Page']['id']), array('escape' => false)); }?></td> 
                                                        <?php } ?>  
                                                        <?php if($page['Page']['enable']){ ?> 
                                                                <td><span class="label label-success">Visível</span></td>  
                                                        <?php } else { ?> 
                                                                <td></td>  
                                                        <?php } ?> 
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