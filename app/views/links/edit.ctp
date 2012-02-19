<div class="links form">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php __('Edit Link'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url', array('label' => 'URL (e.g. \'http://www.example.com\')'));
		echo $this->Form->input('text', array('label' => 'Label (description to be displayed; optional)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Link.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Link.id'))); ?></li>
	</ul>
</div>
