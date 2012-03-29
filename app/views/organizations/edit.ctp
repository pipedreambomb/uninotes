<div class="row">
<div class="hero-unit span4 offset5">
<?php echo $this->Form->create('Organization');?>
	<fieldset>
		<legend><?php __('Edit Organization'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("rows" => 3, "label"=>"Description (optional)", "type" => "textarea"));
		echo $this->Form->input('address', array("label" => "Address (optional)", "rows" => 3, "type" => "textarea"));
		echo $this->Form->input('Link.url', array("label" => "Website (optional)"));
		echo $this->Form->hidden('Link.id');
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
