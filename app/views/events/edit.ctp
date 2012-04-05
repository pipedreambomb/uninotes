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
<div class="row">
<div class="events form span4 offset5 hero-unit">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Name (optional)'));
		echo $this->Form->input('subject_id', array('disabled' => true));
		echo $this->Form->input('newDateTime', array('id' => 'picker', 'default' => $defaultDate, 'label' => 'Date & Time (US calendar format)'));
		$options = array('' => null, '30 mins' => '30 mins', '1 hour' => '1 hour', '1 hour 30 mins' => '1 hour 30 mins', '2 hours'=>'2 hours', '2 hours 30 mins'=>'2 hours 30 mins', '3 hours'=>'3 hours', '4 hours'=>'4 hours', '6 hours'=>'6 hours', '1 day'=>'1 day');
	 	echo $this->Form->input('duration', array('type'=>'select', 'options'=>$options));
		echo $this->Form->input('address', array("label" => "Address (optional)", "rows" => 3, "type" => "textarea"));
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
