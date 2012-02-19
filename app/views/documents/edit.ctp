<div class="links form">
<?php echo $this->Form->create('Document');?>
	<fieldset>
		<legend><?php __('Edit Document'); ?></legend>
	<?php
		echo $this->Form->input('text', array('label' => 'Document Title'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
