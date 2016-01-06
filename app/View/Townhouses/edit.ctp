<div class="townhouses form">
<?php echo $this->Form->create('Townhouse'); ?>
	<fieldset>
		<legend><?php echo __('Edit Townhouse'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Townhouse.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Townhouse.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Townhouses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enterprises'), array('controller' => 'enterprises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enterprise'), array('controller' => 'enterprises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Towers'), array('controller' => 'towers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tower'), array('controller' => 'towers', 'action' => 'add')); ?> </li>
	</ul>
</div>
