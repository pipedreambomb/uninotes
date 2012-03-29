<div class="row">
<div class="links form hero-unit span4 offset5">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php __('Edit Link'); ?>&nbsp;</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url', array('label' => 'Website address'));
		echo $this->Form->input('text', array('label' => 'Title (optional)'));
		echo $this->general->formButtons($this->Form->value('Link.id')) 
	?>
		
	</fieldset>
</div>

</div>
