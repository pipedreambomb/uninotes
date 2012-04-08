<div class="container">
<div class="row"> 
<div class="hero-unit"> 
<?
   $this->Js->buffer(" $('.carousel').carousel({
	        interval: 5000
			    }).carousel('cycle');");
?>
	<h2>Welcome to UniNot.es!</h2>
<div class="row-fluid">
    <div id="myCarousel" class="carousel slide span10">
    <!-- Carousel items -->
    <div class="carousel-inner">
	    <div class="active item">
		<? echo $this->Html->image("carousel-1.jpeg");  ?>
		<div class="carousel-caption">
			<h4>First Thumbnail label</h4>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		</div>
	    </div>
	    <div class="item">
		<? echo $this->Html->image("carousel-2.jpeg");  ?>
		<div class="carousel-caption">
			<h4>First Thumbnail label</h4>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		</div>
	    </div>
	    <div class="item">
		<? echo $this->Html->image("carousel-3.jpeg");  ?>
		<div class="carousel-caption">
			<h4>First Thumbnail label</h4>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		</div>
	    </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
<div class="span2">
<? echo $this->Html->link('Learn More', array('action' => 'display', 'about'), array('class' => 'btn btn-success')); ?>
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
