<div class="container">
<div class="row"> 
<div class="hero-unit"> 

	<h2>Welcome to UniNot.es!</h2>
	<div class="row-fluid">
		<div class="span4">
			<div class="row-fluid">
				<!-- offset with a gap size 3 units -->
				<div class="span3">&nbsp;</div>
				<div class="span6 image-holder ">
					<? echo $this->Html->image("people.png");  ?>
				</div>
				<div class="span12">
			<p>The goal of UniNot.es is to aid collaboration between students, conference attendees and academics, using live event-based note sessions saved for future revision.</p>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="row-fluid">
				<!-- offset with a gap size 3 units -->
				<div class="span3">&nbsp;</div>
				<div class="span6 image-holder ">
					<? echo $this->Html->image("calendar.png");  ?>
				</div>
				<div class="span12">
			<p>Hopefully by May you will be able to find such sessions by organization, location or via people you know also using the site, and learn and share together.</p>  
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="row-fluid">
				<!-- offset with a gap size 3 units -->
				<div class="span3">&nbsp;</div>
				<div class="span6 image-holder ">
					<? echo $this->Html->image("caution.png");  ?>
				</div>
				<div class="span12">
					<p>This site is currently work-in-progress - and you can help by clicking around and <a href="mailto:g@georgenixon.co.uk">telling me</a> if something goes wrong! </p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="span7">
<h2>Recent Activity</h2>
<? echo $this->lists->activity($activity); ?>
</div>
<div class="span5">
<h2>Latest Organizations
<?php echo $this->Html->link(__('Add', true), array('controller' => 'organizations', 'action' => 'add'), array("class"=>"btn btn-primary")); ?>
</h2>
<ul>
<?php
foreach ($organizations as $organization):
?>
<li>
<?php echo $this->Html->link(__($organization['Organization']['name'], true), array('controller' => 'organizations', 'action' => 'view', $organization['Organization']['id'])); ?>
</li>
<?php endforeach; ?>
</ul>
</div>
</div>
</div>
