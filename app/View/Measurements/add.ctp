<div class="measurements form">
<?php echo $this->Form->create('Measurement'); ?>
	<fieldset>
		<legend><?php echo __('Add Measurement'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('transfer_id');
		echo $this->Form->input('cheched');
		echo $this->Form->input('note');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Measurements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('controller' => 'transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfer'), array('controller' => 'transfers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
