<div class="organizations form">
<?php echo $this->Form->create('Organization');?>
	<fieldset>
		<legend><?php __('Add Organization'); ?></legend>
	<?php
		echo $this->Form->input('name');
		//echo $this->Form->input('Link');
		//echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
