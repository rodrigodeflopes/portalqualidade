<div class="townhouses index">
	<h2><?php echo __('Townhouses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('enterprise_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('image_path'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($townhouses as $townhouse): ?>
	<tr>
		<td><?php echo h($townhouse['Townhouse']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($townhouse['Enterprise']['name'], array('controller' => 'enterprises', 'action' => 'view', $townhouse['Enterprise']['id'])); ?>
		</td>
		<td><?php echo h($townhouse['Townhouse']['name']); ?>&nbsp;</td>
		<td><?php echo h($townhouse['Townhouse']['image_path']); ?>&nbsp;</td>
		<td><?php echo h($townhouse['Townhouse']['created']); ?>&nbsp;</td>
		<td><?php echo h($townhouse['Townhouse']['modified']); ?>&nbsp;</td>
		<td><?php echo h($townhouse['Townhouse']['user_modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $townhouse['Townhouse']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $townhouse['Townhouse']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $townhouse['Townhouse']['id']), array(), __('Are you sure you want to delete # %s?', $townhouse['Townhouse']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Townhouse'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enterprises'), array('controller' => 'enterprises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enterprise'), array('controller' => 'enterprises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Towers'), array('controller' => 'towers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tower'), array('controller' => 'towers', 'action' => 'add')); ?> </li>
	</ul>
</div>
