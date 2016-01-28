<div class="appUpdateStatuses form">
<?php echo $this->Form->create('AppUpdateStatus'); ?>
	<fieldset>
		<legend><?php echo __('Add App Update Status'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('cssClass');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List App Update Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List App Updates'), array('controller' => 'app_updates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New App Update'), array('controller' => 'app_updates', 'action' => 'add')); ?> </li>
	</ul>
</div>
