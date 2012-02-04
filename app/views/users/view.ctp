<div class="users view">
<h2><?php  __('User');?></h2>
<? //debug($userProfile) ?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userProfile['User']['username']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Following these events');?></h3>
	<?php if (!empty($userProfile['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('Datetime'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userProfile['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>	<?php echo $this->Html->link(__($event['name'], true), array('controller' => 'events', 'action' => 'view', $event['id'])); ?></td>
			<td><?php echo $event['datetime'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php __('Following these organizations');?></h3>
	<?php if (!empty($userProfile['Organization'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userProfile['Organization'] as $organization):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link(__($organization['name'], true), array('controller' => 'organizations', 'action' => 'view', $organization['id'])); ?> </td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Following these subjects');?></h3>
	<?php if (!empty($userProfile['Subject'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userProfile['Subject'] as $subject):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link(__($subject['name'], true), array('controller' => 'subjects', 'action' => 'view', $subject['id'])); ?>
</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
