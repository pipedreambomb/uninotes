<? //since we use a tab pane on this page, include tabs.js, my JS tab handler
	echo $this->Html->script('tabs.js'); 
?>
<div class="container-fluid">
<div class="row">
<div class="span8 offset2">
<div>
	<h1><? echo $user['username'];  ?>'s Dashboard</h1>
	<p><? echo $this->Html->link('See my profile', array('action' => 'view', $user['id'])); ?></p>
</div>
	<h2>Recent Activity</h2>
    <ul class="nav nav-tabs">
	    <li id="own_tab">
		<a href="#">Own</a>
	    </li>
	    <li id="following_tab">
		<a href="#">Following</a>
	    </li>
	    <li class="active" id="both_tab">
		    <a href="#">Both</a>
	    </li>
    </ul>
	<div id="javascript_warning">Please note that this site requires JavaScript to be enabled in order to work properly.</div>
<div class="tabbed_content" id="own">
	<? echo $this->lists->activity($activity['activity']['own']); ?>
</div>
<div  class="tabbed_content" id="following">
	<? echo $this->lists->activity($activity['activity']['following']); ?>
</div>
<div class="tabbed_content" id="both">
	<? echo $this->lists->activity($activity['activity']['both']); ?>
</div>
</div>
<div class="span4">
<? echo $this->lists->following($userProfile); ?>
<div class="gap_above">
	<h2>Settings</h2>
	<? if($user['google_id'] != null) { ?>
	<label>Google account linked with this account:</label><p><? echo $user['google_id']; ?></p>
	<?
		echo $this->Html->link('Unlink Google account', array('action' => 'gunlink'));
	} else { 
		echo $this->Glink->link();
	} ?>
</div>
</div>
</div>
</div>
