<div class="links form">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php __('Add Link'); ?></legend>
	<?php
		echo $this->Form->input('url', array('label' => 'URL (e.g. \'http://www.example.com\')'));
		echo $this->Form->input('text', array('label' => 'Label (description to be displayed; optional)'));
	echo $this->Form->input($target['type'], array('type' => 'text', 'default' => $target['name'], 'disabled' => true));
//echo $this->Form->input('Organization');
		echo $form->hidden($target['type']. '.id', array( 'value' => $target['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
