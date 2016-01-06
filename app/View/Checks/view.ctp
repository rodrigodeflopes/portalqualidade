<div class="checks view">
<h2><?php echo __('Check'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($check['Check']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($check['Service']['name'], array('controller' => 'services', 'action' => 'view', $check['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($check['Check']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Method'); ?></dt>
		<dd>
			<?php echo h($check['Check']['method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($check['Check']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($check['Check']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Modified'); ?></dt>
		<dd>
			<?php echo h($check['Check']['user_modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Check'), array('action' => 'edit', $check['Check']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Check'), array('action' => 'delete', $check['Check']['id']), array(), __('Are you sure you want to delete # %s?', $check['Check']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Checks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Check'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($check['Item'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tower Id'); ?></th>
		<th><?php echo __('Location1 Id'); ?></th>
		<th><?php echo __('Location2 Id'); ?></th>
		<th><?php echo __('Location3 Id'); ?></th>
		<th><?php echo __('Service Id'); ?></th>
		<th><?php echo __('Check Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($check['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['id']; ?></td>
			<td><?php echo $item['tower_id']; ?></td>
			<td><?php echo $item['location1_id']; ?></td>
			<td><?php echo $item['location2_id']; ?></td>
			<td><?php echo $item['location3_id']; ?></td>
			<td><?php echo $item['service_id']; ?></td>
			<td><?php echo $item['check_id']; ?></td>
			<td><?php echo $item['created']; ?></td>
			<td><?php echo $item['modified']; ?></td>
			<td><?php echo $item['user_modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), array(), __('Are you sure you want to delete # %s?', $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
