<div class="row">
<div class="organizations form hero-unit span4 offset5">
<?php echo $this->Form->create('Organization');?>
	<fieldset>
		<legend><?php __('Add Organization'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("rows" => 3, "label"=>"Description (optional)", "type" => "textarea"));
		echo $this->Form->input('address', array("label" => "Address (optional)", "rows" => 3, "type" => "textarea"));
		echo $this->Form->input('Link.url', array("label" => "Website (optional)"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>
