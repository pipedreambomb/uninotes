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
	<? echo $this->Html->link('Home', array('controller'=>'pages', 'action'=> 'display', 'home')); ?>
&nbsp;&gt;&nbsp;About
<div class="row"> 
<div class="hero-unit"> 
	<h2>About</h2>
	<div class="row-fluid gap_above">
		<div class="span4">
			<div class="row-fluid">
				<!-- offset with a gap size 3 units -->
				<div class="span3">&nbsp;</div>
				<div class="image-holder ">
					<? echo $this->Html->image("1234386_notebook_and_netbook.jpg");  ?>
				</div>
				<div class="span12">
			<p>The goal of UniNotes is to aid collaboration between students, conference attendees and academics, using live event-based note sessions saved for future revision.</p>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="row-fluid">
				<!-- offset with a gap size 3 units -->
				<div class="span3">&nbsp;</div>
				<div class="image-holder ">
					<? echo $this->Html->image("1323620_stadium_chairs.jpg");  ?>
				</div>
				<div class="span12">
			<p>Make notes with your fellow learners, live! Using a familiar Google Docs interface you can edit a document together while watching the same presentation. Plus add links, event times and more.</p>  
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="row-fluid">
				<!-- offset with a gap size 3 units -->
				<div class="span3">&nbsp;</div>
				<div class="image-holder ">
					<? echo $this->Html->image("1365368_traffic_cone_2.jpg");  ?>
				</div>
				<div class="span12">
					<p>This site is currently work-in-progress - and you can help by clicking around and <a href="mailto:g@georgenixon.co.uk">telling me</a> if something goes wrong! </p>
				</div>
			</div>
		</div>
	</div>
</div>
	
</div>
</div>
</div>
