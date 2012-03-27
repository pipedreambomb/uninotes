<div class="organizations form">
<?php echo $this->Form->create('Organization');?>
	<fieldset>
		<legend><?php __('Add Organization'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("label"=>"Description (optional)", "type" => "textarea"));
		echo $this->Form->input('address', array("type" => "textarea"));
		echo $this->Form->input('Link.url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
