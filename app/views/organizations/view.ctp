<div class="container-fluid organizations view">
<div class="row">
<div class="span7 offset2">
<!--Sidebar content--> 
	<h1><?php echo $organization['Organization']['name']; ?>
		<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $organization['Organization']['id']), array("class" => "btn btn-primary")); ?></h1>
	<div>
		<p><em>
		<? if ($organization['Organization']['description'] != null) {
			echo $organization['Organization']['description'];
		} else {
			echo "We don't have a description for this organization yet - could you add one?";
		} ?>
		</p></em>
		<? if ($organization['Link'] != null) {
			echo $this->Html->link($organization['Link']['url'], array('controller' => 'links', 'action' => 'go', $organization['Link']['id']));
		} ?>
	</div>
	<div>
		<h2>Recent Activity</h2>
		To come: organization activity will go here
	</div>
</div>
<div class="main span5">
<!--Body content-->
	<div>
		<h3>Address</h3>
		<p><em>
		<? if ($organization['Organization']['address'] != null) {
			echo $organization['Organization']['address'];
		} else {
			echo "We don't have an address for this organization yet - could you add one?";
		} ?>
		</p></em>
	</div>
		<div class="related">
		<h3><?php __('Subjects');?></h3>
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
				<td class="actions">
					<?php echo $this->Html->link(__('Edit', true), array('controller' => 'subjects', 'action' => 'edit', $subject['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
		<?php echo $this->Html->link(__('New Subject', true), array('controller' => 'subjects', 'action' => 'add'), array("class" => "btn"));?> 
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
