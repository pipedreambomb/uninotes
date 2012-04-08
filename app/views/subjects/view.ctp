<? //since we use a tab pane on this page, include tabs.js, my JS tab handler
	echo $this->Html->script('tabs.js'); 
?>
<div class="container-fluid organizations view">
<div class="row">
<div class="span8 offset2">
<div class="subjects view">
	<? echo $this->Html->link('Home', array('controller'=>'pages', 'action'=> 'display', 'home')); ?>
&nbsp;&gt;&nbsp;
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
		<? echo $this->lists->activity($activity); ?>
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
	<h3><?php __('Events');?>
			<?php echo $this->Html->link(__('Add', true), array('controller' => 'events', 'action' => 'add', $subject['Subject']['id']), array("class" => 'btn'));?> 
	</h3>
	<?php if (!empty($subject['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th class="span3">Name</th>
		<th class="span3">Date & Time</th>
	</tr>
	<?php
		foreach ($subject['Event'] as $event):
		?>
		<tr>
<?php
		$eventName = "";
		if($nametemp = $event['name']) {
		$eventName = $nametemp;
	      } else {
		$eventName = "Event (" . $subject['Subject']['name'] . ")";
	      }
?>
			<td class="span3"><?php echo $this->Html->link($eventName, array('controller' => 'events', 'action' => 'view', $event['id'])); ?></td>
			<td class="span3"><?php echo $event['date_nice_str'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
		</ul>
	</div>
</div>
</div>
<div class="main span4">
<div class="related">
	<h3><?php 
		echo 'Users following subject '; 
		echo $this->general->followUnfollowButton($subject['Subject']['id'], $isFollowing); ?>
</h3>
	<? echo $this->lists->users($subject['User']); ?>
	<div class=\"actions\">
	</div>
</div>
</div>
