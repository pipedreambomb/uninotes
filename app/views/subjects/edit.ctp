<div class="row">
<div class="subjects form hero-unit span4 offset5">
<?php echo $this->Form->create('Subject');?>
	<fieldset>
		<legend><?php __('Edit Subject'); ?></legend>
	<?php
		echo $this->Form->input('organization_id', array('disabled' => true));
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("label"=>"Description (optional)", "type" => "textarea"));
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
