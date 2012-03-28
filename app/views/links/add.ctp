<div class="row">
<div class="links form hero-unit span4 offset5">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php __('Add Link'); ?></legend>
	<?php
		echo $this->Form->input($target['type'], array('type' => 'text', 'default' => $target['name'], 'disabled' => true));
		echo $this->Form->input('url', array('label' => 'Website address'));
		echo $this->Form->input('text', array('label' => 'Title (optional)'));
		echo $form->hidden($target['type']. '.id', array( 'value' => $target['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>
