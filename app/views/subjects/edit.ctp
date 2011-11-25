<div class="subjects form">
<?php echo $this->Form->create('Subject');?>
	<fieldset>
		<legend><?php __('Edit Subject'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('organization_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Subject.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Subject.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>