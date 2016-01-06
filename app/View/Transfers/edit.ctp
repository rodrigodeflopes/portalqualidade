<div class="transfers form">
<?php echo $this->Form->create('Transfer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transfer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tower_id');
		echo $this->Form->input('type');
		echo $this->Form->input('code_access');
		echo $this->Form->input('folder_path');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transfer.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Transfer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enterprises'), array('controller' => 'enterprises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enterprise'), array('controller' => 'enterprises', 'action' => 'add')); ?> </li>
	</ul>
</div>
