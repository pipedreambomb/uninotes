<?php /*
* Copyright 2013 George Nixon
* 
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
* 
*   http://www.apache.org/licenses/LICENSE-2.0
* 
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/ ?>
<div class="container">
<div class="row"> 
<div class="hero-unit"> 
<?
$this->Js->buffer(" 
	// Set scroll interval at 5 seconds
	var itv = 5000
	 ,  carousel = $('.carousel')
	 carousel.carousel({interval: itv})
	 	  .carousel('cycle')
		  // Pause carousel if left/right slider button is clicked
		  .one('click', function() { 
		  	carousel.carousel('pause')
		  })
	");
?>
	<h2>Welcome to UniNotes!</h2>
<div class="row-fluid">
    <div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
	    <div class="active item">
		<? echo $this->Html->image("gdocs.png");  ?>
		<div class="carousel-caption">
			<h4>Live note sessions</h4>
			<p>Use the familiar Google Docs web app to share knowledge with your fellow learners in real time! Find sessions relevant to you and collaborate to crowd-source your learning experience.</p>
<? echo $this->Html->link('Learn More', array('action' => 'display', 'about'), array('class' => 'btn btn-success pull-right')); ?>
		</div>
	    </div>
	    <div class="item">
		<? echo $this->Html->image("structure.png");  ?>
		<div class="carousel-caption">
			<h4>Structured approach to learning</h4>
			<p>No need to reinvent the wheel - notes are structured by organizations (universities, conferences, schools), subjects (topics, modules) and events.</p>
<? echo $this->Html->link('Learn More', array('action' => 'display', 'about'), array('class' => 'btn btn-success pull-right')); ?>
		</div>
	    </div>
	    <div class="item">
		<? echo $this->Html->image("dashboard.png");  ?>
		<div class="carousel-caption">
			<h4>Dashboard</h4>
			<p>Keep track of updates to your followed organizations, subjects and events with a homepage customized to be relevant to you.</p>
<? echo $this->Html->link('Learn More', array('action' => 'display', 'about'), array('class' => 'btn btn-success pull-right')); ?>
		</div>
	    </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
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
