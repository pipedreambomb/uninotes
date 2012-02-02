<div class="subjects form">
<?php echo $this->Form->create('Subject');?>
	<fieldset>
		<legend><?php __('Edit Subject'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		//TODO Maybe make this read-only?
		echo $this->Form->input('organization_id');
		//echo $this->Form->input('Link');
		//echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Subject.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Subject.id'))); ?></li>
	</ul>
</div>
