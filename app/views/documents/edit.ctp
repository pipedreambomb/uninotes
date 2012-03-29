<div class="row">
<div class="links form hero-unit span4 offset5">
<?php echo $this->Form->create('Document');?>
	<fieldset>
		<legend><?php __('Edit Document'); ?></legend>
	<?php
		echo $this->Form->input('targetName', array('label' => 'Pertaining to ' . $target['type'], 'disabled' => true, 'value' => $target['name']));
		echo $this->Form->input('id');
		echo $this->Form->input('text', array('label' => 'Document Title'));
		echo $this->Form->hidden('google_doc_id');
		echo $form->hidden('targetType', array( 'value' => $target['type']));
		echo $form->hidden('targetId', array( 'value' => $target['id']));
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
