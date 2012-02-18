<div class="events view">
<h2><?php  __('Event');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Datetime'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['datetime']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subject'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($event['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $event['Subject']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Textual Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['textual_notes']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related documents">
	<h3><?php __('Documents');?></h3>
	<?php echo $this->lists->documents($event['Document'], 'Event', $event['Event']['id']); ?>
</div>
<div class="related links">
	<h3><?php __('Links');?></h3>
	<?php echo $this->lists->links($event['Link'], 'Event', $event['Event']['id']); ?>
</div>
<div class="related">
	<h3><?php __('Users following this event');?></h3>
	<? echo $this->lists->users($event['User']); ?>
	<div class="actions">
		<ul>
			<li><?php 
				echo $this->Html->link(__('Follow this event', true), array('action' => 'follow', $event['Event']['id']));?> 
			</li>
                </ul>
        </div>
</div>
</div>
