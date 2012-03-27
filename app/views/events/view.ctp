<? //since we use a tab pane on this page, include tabs.js, my JS tab handler
	echo $this->Html->script('tabs.js'); 
?>
<div class="container-fluid organizations view">
<div class="row">
<div class="span8 offset2">
<div class="events view">
<h2>
	<?php echo $event['Event']['name']; ?>
</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
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
	</dl>
</div>
    <ul class="nav nav-tabs">
	    <li class="active" id="activity_tab">
		    <a href="#">Activity</a>
	    </li>
	    <li id="notes_tab">
		<a href="#">Notes</a>
	    </li>
	    <li id="links_tab">
		<a href="#">Links</a>
	    </li>
    </ul>
	<div id="javascript_warning">Please note that this site requires JavaScript to be enabled in order to work properly.</div>
	<div class="tabbed_content" id="activity">
		<h2>Recent Activity</h2>
		To come: organization activity will go here
	</div>
<div class="related documents tabbed_content" id="notes">
	<h3><?php __('Notes');?></h3>
	<?php echo $this->lists->documents($event['Document'], 'Event', $event['Event']['id']); ?>
</div>
<div class="related links tabbed_content" id="links">
	<h3><?php __('Links');?></h3>
	<?php echo $this->lists->links($event['Link'], 'Event', $event['Event']['id']); ?>
</div>
</div>
<div class="span4">
<div class="related">
	<h3><?php __('Users following this event');?></h3>
	<? echo $this->lists->users($event['User']); ?>
	<div class=\"actions\">
		<? echo $this->Html->link(__('Follow This Event', true),	array('action' => 'follow', $event['Event']['id']), array('class' => 'btn')); ?>
	</div>
</div>
</div>
