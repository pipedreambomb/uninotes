<div class="organizations view">
<h2><?php  __('Organization');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization', true), array('action' => 'edit', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Organization', true), array('action' => 'delete', $organization['Organization']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject', true), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Subjects');?></h3>
	<?php if (!empty($organization['Subject'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['Subject'] as $subject):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $subject['id'];?></td>
			<td><?php echo $subject['name'];?></td>
			<td><?php echo $subject['organization_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'subjects', 'action' => 'view', $subject['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'subjects', 'action' => 'edit', $subject['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'subjects', 'action' => 'delete', $subject['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subject['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subject', true), array('controller' => 'subjects', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
