<div class="appUpdateStatuses view">
<h2><?php echo __('App Update Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($appUpdateStatus['AppUpdateStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($appUpdateStatus['AppUpdateStatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CssClass'); ?></dt>
		<dd>
			<?php echo h($appUpdateStatus['AppUpdateStatus']['cssClass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($appUpdateStatus['AppUpdateStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($appUpdateStatus['AppUpdateStatus']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Modified'); ?></dt>
		<dd>
			<?php echo h($appUpdateStatus['AppUpdateStatus']['user_modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit App Update Status'), array('action' => 'edit', $appUpdateStatus['AppUpdateStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete App Update Status'), array('action' => 'delete', $appUpdateStatus['AppUpdateStatus']['id']), array(), __('Are you sure you want to delete # %s?', $appUpdateStatus['AppUpdateStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List App Update Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New App Update Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List App Updates'), array('controller' => 'app_updates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New App Update'), array('controller' => 'app_updates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related App Updates'); ?></h3>
	<?php if (!empty($appUpdateStatus['AppUpdate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('App Update Status Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('App Path'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($appUpdateStatus['AppUpdate'] as $appUpdate): ?>
		<tr>
			<td><?php echo $appUpdate['id']; ?></td>
			<td><?php echo $appUpdate['app_update_status_id']; ?></td>
			<td><?php echo $appUpdate['name']; ?></td>
			<td><?php echo $appUpdate['app_path']; ?></td>
			<td><?php echo $appUpdate['description']; ?></td>
			<td><?php echo $appUpdate['created']; ?></td>
			<td><?php echo $appUpdate['modified']; ?></td>
			<td><?php echo $appUpdate['user_modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'app_updates', 'action' => 'view', $appUpdate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'app_updates', 'action' => 'edit', $appUpdate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'app_updates', 'action' => 'delete', $appUpdate['id']), array(), __('Are you sure you want to delete # %s?', $appUpdate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New App Update'), array('controller' => 'app_updates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
