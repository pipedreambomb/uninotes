<? //since we use a tab pane on this page, include tabs.js, my JS tab handler
	echo $this->Html->script('tabs.js'); 
?>
<div class="container-fluid organizations view">
<div class="row">
<div class="span8 offset2">
<!--Sidebar content--> 
	<h1><?php echo $organization['Organization']['name']; ?>
		<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $organization['Organization']['id']), array("class" => "btn btn-primary")); ?></h1>
	<div>
		<p><em>
		<? if ($organization['Organization']['description'] != null) {
			echo $organization['Organization']['description'];
		} else {
			echo "We don't have a description for this organization yet - why not help out and " . $this->Html->link('add one', array("action" => "edit", $organization['Organization']['id'])) . "?";
		} ?>
		</p></em>
		<? if ($organization['Link'] != null) {
			echo $this->Html->link($organization['Link']['url'], array('controller' => 'links', 'action' => 'go', $organization['Link']['id']));
		} ?>
	</div>
    <ul class="nav nav-tabs">
	    <li class="active" id="activity_tab">
		    <a href="#">Activity</a>
	    </li>
	    <li id="subjects_tab">
		<a href="#">Subjects</a>
	    </li>
    </ul>
	<div class="tabbed_content" id="activity">
		<h2>Recent Activity</h2>
		To come: organization activity will go here
	</div>
	<div class="related tabbed_content" id="subjects">
		<h3><?php __('Subjects');?>
			<?php echo $this->bootstrap->linkWithIcon('Add', array('controller' => 'subjects', 'action' => 'add'), array("class" => "btn", "icon" => "icon-file"));?> 
		</h3>
		<?php if (!empty($organization['Subject'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<?php
			$i = 0;
			foreach ($organization['Subject'] as $subject):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
					
				<td><?php echo $this->Html->link(__($subject['name'], true), array('controller' => 'subjects', 'action' => 'view', $subject['id'])); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</div>
</div>
<div class="main span4">
<!--Body content-->
	<div>
		<h3>Address</h3>
		<p><em>
			<? 
			$address = $organization['Organization']['address'];
			if ($address != null) {
			echo $this->map->locationMap($address);
		} else {
			echo "We don't have an address for this organization yet - why not help out and " . $this->Html->link('add one', array("action" => "edit", $organization['Organization']['id'])) . "?";
		} ?>
		</p></em>
	</div>
	<div class="related">
		<h3><?php __('Users following this organization');?></h3>
		<? echo $this->lists->users($organization['User']); ?>
		<div class=\"actions\">
				<? echo $this->Html->link(__('Follow This Organization', true), 
				array('action' => 'follow', $organization['Organization']['id']), array('class' => 'btn')); ?>
		</div>
	</div>
</div>
