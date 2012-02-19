<div class="links form">
<?php echo $this->Form->create('Document');?>
	<fieldset>
		<legend><?php __('Edit Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('text', array('label' => 'Document Title'));
		echo $this->Form->hidden('google_doc_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
