<div class="container">
<div class="hero-unit">
<div class="row">
<?php echo $this->Form->create('Organization');?>
	<fieldset>
		<legend><?php __('Edit Organization'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("type" => "textarea"));
		echo $this->Form->input('address', array("type" => "textarea"));
		echo $this->Form->input('Link.url');
		echo $this->Form->hidden('Link.id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Organization.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Organization.id'))); ?></li>
	</ul>
</div>
</div>
</div>
