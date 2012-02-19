<div class="subjects view">
<h2><?php echo 'Subject - ' . $subject['Subject']['name'];?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($subject['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $subject['Organization']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subject', true), array('action' => 'edit', $subject['Subject']['id'])); ?> </li>
	</ul>
</div>
<div class="related documents">
	<h3><?php __('Notes');?></h3>
	<?php echo $this->lists->documents($subject['Document'], 'Subject', $subject['Subject']['id']); ?>
</div>
<div class="related links">
	<h3><?php __('Links');?></h3>
	<?php echo $this->lists->links($subject['Link'], 'Subject', $subject['Subject']['id']); ?>
</div>
<div class="related">
	<h3><?php __('Events');?></h3>
	<?php if (!empty($subject['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<!--TODO: nicer date formats-->
		<th><?php __('Datetime'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subject['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link(__($event['name'], true), array('controller' => 'events', 'action' => 'view', $event['id'])); ?></td>
			<td><?php echo $event['datetime'];?></td>
			<td><?php //echo $event['textual_notes'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'events', 'action' => 'delete', $event['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Users following this subject');?></h3>
	<? echo $this->lists->users($subject['User']); ?>
	<div class="actions">
		<ul>
			<li><?php 
				echo $this->Html->link(__('Follow this subject', true), array('action' => 'follow', $subject['Subject']['id']));?> 
			</li>
                </ul>
        </div>
</div>
