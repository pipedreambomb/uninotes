<? //since we use a tab pane on this page, include tabs.js, my JS tab handler
	echo $this->Html->script('tabs.js'); 
?>
<div class="container-fluid organizations view">
<div class="row">
<div class="span8 offset2">
<div class="subjects view">
	<? echo $this->Html->link('Home', array('controller'=>'pages', 'action'=> 'display', 'home')); ?> &gt;
			<?php echo $this->Html->link($subject['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $subject['Organization']['id'])); ?>
	&gt; <?php echo $subject['Subject']['name'];?>
<h1><?php echo $subject['Subject']['name'];?>
		<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $subject['Subject']['id']), array("class" => "btn btn-primary")); ?> </h1>
</div>
	<p><em>
	<? if ($subject['Subject']['description'] != null) {
		echo $subject['Subject']['description'];
	} else {
		echo "We don't have a description for this subject yet - why not help out and " . $this->Html->link('add one', array("action" => "edit", $subject['Subject']['id'])) . "?";
	} ?>
	</p></em>
    <ul class="nav nav-tabs">
	    <li class="active" id="activity_tab">
		    <a href="#">Activity</a>
	    </li>
	    <li id="events_tab">
		<a href="#">Events</a>
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
<div class="tabbed_content related documents" id="notes">
	<h3><?php __('Notes');?></h3>
	<?php echo $this->lists->documents($subject['Document'], 'Subject', $subject['Subject']['id']); ?>
</div>
<div class="related links tabbed_content" id="links">
	<h3><?php __('Links');?></h3>
	<?php echo $this->lists->links($subject['Link'], 'Subject', $subject['Subject']['id']); ?>
</div>
<div class="tabbed_content related" id="events">
	<h3><?php __('Events');?></h3>
	<?php if (!empty($subject['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<!--TODO: nicer date formats-->
		<th><?php __('Datetime'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subject['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link(__($event['name'], true), array('controller' => 'events', 'action' => 'view', $event['id'])); ?></td>
			<td><?php echo $event['datetime'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add', $subject['Subject']['id']));?> </li>
		</ul>
	</div>
</div>
</div>
<div class="main span4">
<div class="related">
	<h3><?php __('Users following this subject');?></h3>
	<? echo $this->lists->users($subject['User']); ?>
	<div class=\"actions\">
		<? echo $this->Html->link(__('Follow This Subject', true),	array('action' => 'follow', $subject['Subject']['id']), array('class' => 'btn')); ?>
	</div>
</div>
</div>
