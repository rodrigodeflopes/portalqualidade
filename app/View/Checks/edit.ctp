<div class="checks form">
<?php echo $this->Form->create('Check'); ?>
	<fieldset>
		<legend><?php echo __('Edit Check'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('service_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Check.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Check.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Checks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
