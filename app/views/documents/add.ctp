<div class="documents form">
<?php echo $this->Form->create('Document');?>
	<fieldset>
		<legend><?php __('Add Document'); ?></legend>
	<?php
		echo $this->Form->input('text', array('label' => 'Title (optional)'));
	echo $this->Form->input($target['type'], array('type' => 'text', 'default' => $target['name'], 'disabled' => true));
		echo $form->hidden($target['type']. '.id', array( 'value' => $target['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>