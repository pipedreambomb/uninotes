<div class="organizations view">
<h2><?php  __('Organization');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
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
	</ul>
</div>
<div class="related documents">
	<h3><?php __('Notes');?></h3>
	<?php echo $this->lists->documents($organization['Document'], 'Organization', $organization['Organization']['id']); ?>
</div>
<div class="related links">
	<h3><?php __('Links');?></h3>
	<? echo $this->lists->links($organization['Link'], 'Organization', $organization['Organization']['id'] ); ?>
</div>
<div class="related">
	<h3><?php __('Subjects');?></h3>
	<?php if (!empty($organization['Subject'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
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
				
			<td><?php echo $this->Html->link(__($subject['name'], true), array('controller' => 'subjects', 'action' => 'view', $subject['id'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'subjects', 'action' => 'edit', $subject['id'])); ?>
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
<div class="related">
	<h3><?php __('Users following this organization');?></h3>
	<? echo $this->lists->users($organization['User']); ?>
	<div class=\"actions\">
			<? echo $this->Html->link(__('Follow This Organization', true), 
			array('action' => 'follow', $organization['Organization']['id']), array('class' => 'link_button')); ?>
	</div>
</div>
