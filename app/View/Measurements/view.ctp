<div class="measurements view">
<h2><?php echo __('Measurement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($measurement['Measurement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($measurement['Item']['name'], array('controller' => 'items', 'action' => 'view', $measurement['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transfer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($measurement['Transfer']['id'], array('controller' => 'transfers', 'action' => 'view', $measurement['Transfer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheched'); ?></dt>
		<dd>
			<?php echo h($measurement['Measurement']['cheched']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($measurement['Measurement']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($measurement['Measurement']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($measurement['Measurement']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Modified'); ?></dt>
		<dd>
			<?php echo h($measurement['Measurement']['user_modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Measurement'), array('action' => 'edit', $measurement['Measurement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Measurement'), array('action' => 'delete', $measurement['Measurement']['id']), array(), __('Are you sure you want to delete # %s?', $measurement['Measurement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Measurements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measurement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('controller' => 'transfers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfer'), array('controller' => 'transfers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Photos'); ?></h3>
	<?php if (!empty($measurement['Photo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image Path'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($measurement['Photo'] as $photo): ?>
		<tr>
			<td><?php echo $photo['id']; ?></td>
			<td><?php echo $photo['item_id']; ?></td>
			<td><?php echo $photo['name']; ?></td>
			<td><?php echo $photo['image_path']; ?></td>
			<td><?php echo $photo['created']; ?></td>
			<td><?php echo $photo['modified']; ?></td>
			<td><?php echo $photo['user_modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'photos', 'action' => 'view', $photo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'photos', 'action' => 'edit', $photo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['id']), array(), __('Are you sure you want to delete # %s?', $photo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
