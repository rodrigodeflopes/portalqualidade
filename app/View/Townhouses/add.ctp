<div class="townhouses form">
<?php echo $this->Form->create('Townhouse'); ?>
	<fieldset>
		<legend><?php echo __('Add Townhouse'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id');
		echo $this->Form->input('name');
		echo $this->Form->input('image_path');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Townhouses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enterprises'), array('controller' => 'enterprises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enterprise'), array('controller' => 'enterprises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Towers'), array('controller' => 'towers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tower'), array('controller' => 'towers', 'action' => 'add')); ?> </li>
	</ul>
</div>
