<div class="appUpdates form">
<?php echo $this->Form->create('AppUpdate'); ?>
	<fieldset>
		<legend><?php echo __('Add App Update'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('app_path');
		echo $this->Form->input('description');
		echo $this->Form->input('user_modified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List App Updates'), array('action' => 'index')); ?></li>
	</ul>
</div>
