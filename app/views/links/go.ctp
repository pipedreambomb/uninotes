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
<div class="row">
<div class="hero-unit span6 offset4">
	
	<h2>External link: <? echo $link['Link']['text']; ?></h2>
	
	<? 
	$countdownScript = "$(function(){
		  var count = 5;
		    countdown = setInterval(function(){
			        $('#countdown').html(count.toString());
				    if (count == 0) {
					          window.location = '" . $link['Link']['url'] . "';
						      }
		      count--;
		    }, 1000);
		  });
		";
	$this->Js->buffer($countdownScript);
	?>
	<p>Redirecting you to <? echo $this->Html->link($link['Link']['url'], null, array('rel' => 'nofollow')); ?> in <span id="countdown">5</span> seconds.</p>
	
	<p>Please be aware that you are now leaving this site and that UniNotes accepts no responsibility for external websites and their content.</p>

</div>
</div>
