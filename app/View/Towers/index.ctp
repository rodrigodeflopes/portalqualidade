<div class="towers index">
	<h2><?php echo __('Towers'); ?></h2>
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
	<?php foreach ($towers as $tower): ?>
	<tr>
		<td><?php echo h($tower['Tower']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tower['Enterprise']['name'], array('controller' => 'enterprises', 'action' => 'view', $tower['Enterprise']['id'])); ?>
		</td>
		<td><?php echo h($tower['Tower']['name']); ?>&nbsp;</td>
		<td><?php echo h($tower['Tower']['image_path']); ?>&nbsp;</td>
		<td><?php echo h($tower['Tower']['created']); ?>&nbsp;</td>
		<td><?php echo h($tower['Tower']['modified']); ?>&nbsp;</td>
		<td><?php echo h($tower['Tower']['user_modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tower['Tower']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tower['Tower']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tower['Tower']['id']), array(), __('Are you sure you want to delete # %s?', $tower['Tower']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tower'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enterprises'), array('controller' => 'enterprises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enterprise'), array('controller' => 'enterprises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('controller' => 'transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfer'), array('controller' => 'transfers', 'action' => 'add')); ?> </li>
	</ul>
</div>
