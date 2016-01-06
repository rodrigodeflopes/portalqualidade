<!-- Theme JS files -->
<?php echo $this->Html->script(array(
    '/assets/js/core/libraries/jquery_ui/widgets.min',
    '/assets/js/plugins/tables/datatables/datatables.min',
    '/assets/js/plugins/tables/datatables/extensions/natural_sort',
    '/assets/js/plugins/forms/selects/select2.min',
    '/assets/js/pages/tasks_list'
)); ?>
<!-- /Theme JS files -->


<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/tasks_list.js"></script>
	<!-- /theme JS files -->

<!-- Page header -->
<div class="page-header">
        <div class="page-header-content">
                <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Fichas de verificação</span></h4>
                </div>

                <div class="heading-elements">
                        <div class="heading-btn-group">
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                        </div>
                </div>
        </div>

        <div class="breadcrumb-line">
                <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> Fichas de verificação</a></li>
                </ul>

                <ul class="breadcrumb-elements">
                        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-gear position-left"></i>
                                        Settings
                                        <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                        <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                        <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                                </ul>
                        </li>
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

                <table class="table tasks-list table-lg">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Period</th>
                                        <th>Task Description</th>
                                        <th>Priority</th>
                                        <th>Latest update</th>
                                        <th>Status</th>
                                        <th>Assigned users</th>
                                        <th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($services as $service): ?>
                                        <tr>
                                                <td>#25</td>
                                                <td>Today</td>
                                                <td>
                                                        <div class="text-semibold"><a href="task_manager_detailed.html">New blog layout</a></div>
                                                        <div class="text-muted">Grumbled ripely eternal sniffed the when hello less much..</div>
                                                </td>
                                                <td>
                                                        <div class="btn-group">
                                                                                <a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">Highest <span class="caret"></span></a>
                                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                                        <li class="active"><a href="#"><span class="status-mark position-left bg-danger"></span> Highest priority</a></li>
                                                                                        <li><a href="#"><span class="status-mark position-left bg-info"></span> High priority</a></li>
                                                                                        <li><a href="#"><span class="status-mark position-left bg-primary"></span> Normal priority</a></li>
                                                                                        <li><a href="#"><span class="status-mark position-left bg-success"></span> Low priority</a></li>
                                                                                </ul>
                                                                        </div>
                                                </td>
                                                <td>
                                                        <div class="input-group input-group-transparent">
                                                                <div class="input-group-addon"><i class="icon-calendar2 position-left"></i></div>
                                                                <input type="text" class="form-control datepicker" value="22 January, 15">
                                                        </div>
                                                </td>
                                                <td>
                                                        <select name="status" class="select" data-placeholder="Select status">
                                                                <option value="open">Open</option>
                                                                <option value="hold">On hold</option>
                                                                <option value="resolved" selected="selected">Resolved</option>
                                                                <option value="dublicate">Dublicate</option>
                                                                <option value="invalid">Invalid</option>
                                                                <option value="wontfix">Wontfix</option>
                                                                <option value="closed">Closed</option>
                                                        </select>
                                                </td>
                                                <td>
                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                                                        <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                                                        <a href="#" class="text-default">&nbsp;<i class="icon-plus22"></i></a>
                                                </td>
                                                <td class="text-center">
                                                        <ul class="icons-list">
                                                                <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                <li><a href="#"><i class="icon-alarm-add"></i> Check in</a></li>
                                                                                <li><a href="#"><i class="icon-attachment"></i> Attach screenshot</a></li>
                                                                                <li><a href="#"><i class="icon-rotate-ccw2"></i> Reassign</a></li>
                                                                                <li class="divider"></li>
                                                                                <li><a href="#"><i class="icon-pencil7"></i> Edit task</a></li>
                                                                                <li><a href="#"><i class="icon-cross2"></i> Remove</a></li>
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























<div class="services index">
	<h2><?php echo __('Services'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('enterprise_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($services as $service): ?>
	<tr>
		<td><?php echo h($service['Service']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($service['Enterprise']['name'], array('controller' => 'enterprises', 'action' => 'view', $service['Enterprise']['id'])); ?>
		</td>
		<td><?php echo h($service['Service']['code']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['name']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['created']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['modified']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['user_modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $service['Service']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $service['Service']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $service['Service']['id']), array(), __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enterprises'), array('controller' => 'enterprises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enterprise'), array('controller' => 'enterprises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Checks'), array('controller' => 'checks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Check'), array('controller' => 'checks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
