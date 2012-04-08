<? //since we use a tab pane on this page, include tabs.js, my JS tab handler
	echo $this->Html->script('tabs.js'); 
?>
<div class="container-fluid organizations view">
<div class="row">
<div class="span8 offset2">
<div class="events view">
<? echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home')); ?>
&nbsp;&gt;&nbsp;
<? echo $this->Html->link($org['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $org['Organization']['id'])); ?>
&nbsp;&gt;&nbsp;
<?php echo $this->Html->link($event['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $event['Subject']['id'])); ?>
&nbsp;&gt;&nbsp;
<? echo $event['Event']['name']; ?>
<h1>
	<?php if($name = $event['Event']['name']) {
		echo $name;
	      } else {
		echo "Event (" . $event['Subject']['name'] . ")";
	      }
?>
	<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $event['Event']['id']), array("class" => "btn btn-primary")); ?> 
</h1>
<br />
<?php  
	if(isset($event['Event']['date_nice_str'])) {
		echo "<p><strong>When: </strong>" . $event['Event']['date_nice_str'] . "</p>";
	}
	if(isset($event['Event']['duration'])) {
		echo "<p><strong>Duration: </strong>" . $event['Event']['duration'] . "</p>";
	}
?>
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
		<? echo $this->lists->activity($activity); ?>
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
	<div>
		<h3>Address</h3>
		<p><em>
			<? 
			$address = $event['Event']['address'];
			if ($address != null) {
			echo $this->map->locationMap($address);
		} else {
			echo "We don't have an address for this event yet - why not help out and " . $this->Html->link('add one', array("action" => "edit", $event['Event']['id'])) . "?";
		} ?>
		</p></em>
	</div>
<div class="related">
	<h3><?php 
		echo 'users following event '; 
		echo $this->general->followunfollowbutton($event['Event']['id'], $isFollowing); ?>
</h3>
	<? echo $this->lists->users($event['User']); ?>
	<div class=\"actions\">
	</div>
</div>
</div>
