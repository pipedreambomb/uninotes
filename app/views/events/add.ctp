<? 
	//include date/time picker by Trent Richardson and requisite jQueryUI 
	//with required components
	echo $this->Html->script('jquery-ui-1.8.18.custom.min.js');
	echo $this->Html->script('jquery-ui-timepicker-addon.js');
	echo $this->Html->css('timepicker');
	echo $this->Html->css('jquery-ui-1.8.18.custom');
	//set picker to work on field with id picker, created below
	$this->Js->buffer("$('#picker').datetimepicker();");
?>
<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Name (optional)'));
		echo $this->Form->input('Subj', array('type' => 'text', 'default' => $subject['Subject']['name'], 'disabled' => true, "label" => "Subject"));
		echo $form->hidden('subject_id', array( 'value' => $subject['Subject']['id']));
		echo $this->Form->input('newDateTime', array('id' => 'picker', 'label' => 'Date & Time (US calendar format)'));
		$options = array('' => null, '30 mins', '1 hour', '1 hour 30 mins', '2 hours', '2 hours 30 mins', '3 hours', '4 hours', '6 hours', '1 day');
	 	echo $this->Form->input('duration', array('type'=>'select', 'options'=>$options));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
