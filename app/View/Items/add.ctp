<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('tower_id');
		echo $this->Form->input('loc1');
		echo $this->Form->input('loc2');
		echo $this->Form->input('loc3');
		echo $this->Form->input('loc4');
		echo $this->Form->input('name');
		echo $this->Form->input('method');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Towers'), array('controller' => 'towers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tower'), array('controller' => 'towers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measurements'), array('controller' => 'measurements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measurement'), array('controller' => 'measurements', 'action' => 'add')); ?> </li>
	</ul>
</div>
