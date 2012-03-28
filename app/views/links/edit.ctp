<div class="row">
<div class="links form hero-unit span4 offset5">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php __('Edit Link'); ?>&nbsp;
<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Link.id')), array('class'=>'btn btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Link.id'))); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url', array('label' => 'Website address'));
		echo $this->Form->input('text', array('label' => 'Title (optional)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

</div>
