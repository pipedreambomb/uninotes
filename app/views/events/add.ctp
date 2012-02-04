<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('datetime');
		echo $this->Form->input('subject_id');
		echo $this->Form->input('textual_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject', true), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
