<div class="row">
<div class="subjects form hero-unit span4 offset5">
<?php echo $this->Form->create('Subject');?>
	<fieldset>
		<legend><?php __('Add Subject'); ?></legend>
	<?php
		echo $this->Form->input('Org', array('type' => 'text', 'default' => $organization['Organization']['name'], 'disabled' => true, "label" => "Organization"));
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("label"=>"Description (optional)", "type" => "textarea"));
		echo $form->hidden('organization_id', array( 'value' => $organization['Organization']['id']));
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
