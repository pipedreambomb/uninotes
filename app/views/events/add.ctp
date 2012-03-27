<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('datetime');
		echo $this->Form->input('Subj', array('type' => 'text', 'default' => $subject['Subject']['name'], 'disabled' => true, "label" => "Subject"));
		echo $form->hidden('subject_id', array( 'value' => $subject['Subject']['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
