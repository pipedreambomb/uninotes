<div class="hero-unit">
<!--Body content-->
	<h2><?php __('Organizations');?></h2>
	<ul>
	<?php
	foreach ($organizations as $organization):
	?>
	<li>
			<?php echo $this->Html->link(__($organization['Organization']['name'], true), array('action' => 'view', $organization['Organization']['id'])); ?>
	</li>
<?php endforeach; ?>
	</ul>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
		<?php echo $this->Html->link(__('New Organization', true), array('action' => 'add')); ?>
