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
<div class="row span10 offset1">
	<? echo $this->Html->link('Home', array('controller'=>'pages', 'action'=> 'display', 'home')); ?>
	&nbsp;&gt;&nbsp;Open Source
</div>
<div class="row span8 offset2">
	<br />
	<h2>Open Source</h2>
	<br />
	<p>
		Uninotes was originally developed as a final year project for my Bachelor's degree. The source code is now available online at <a href="http://github.com/pipedreambomb/uninotes">GitHub</a>. I (George Nixon) am the copyright holder, but the repository is made public under an <a href="http://www.apache.org/licenses/LICENSE-2.0.html">Apache 2.0 License</a>, meaning you can create derivative works, etc, as long as I get attribution and you redistribute the license with any source code. 
	</p>

	<p> 
		Part of the reason for this is to make available code in case it becomes useful to someone else, as I don't anticipate needing it now the coursework has been submitted. The other reason is that it was built using many open source projects, and although I am not required to by their licenses, I wanted to feed back my work in case it can provide someone anything like the utility that they have provided to me. </p>
	<p>
		As such, the following is a list of the open source software used in making this website:
	</p>
	<ul style="list-style:none">
		<li><a href="http://cakephp.org">CakePHP</a> - MVC PHP framework underpinning the whole site. Thanks CakePHP!</li> 
		<li><a href="http://twitter.github.com/bootstrap/">Bootstrap from Twitter</a> - UI framework that helped with layout, look-and-feel and more.</li>
		<li><a href="https://github.com/mtkocak/Cakephp-Bootstrappifier">CakePHP Bootstrappifier</a> - neat little JavaScript library for fitting Bootstrap to the baked-in (get it?) CakePHP CSS classes and so on. Added a little modification upstream myself :)</li>
		<li><a href="https://code.google.com/p/google-api-php-client/">Google API PHP Client</a> - you can probably guess what this is if you read this far.</li> 
		<li><a href="http://jquery.com">jQuery</a> - JavaScript library to end all libraries.</li> 
		<li><a href="http://trentrichardson.com/examples/timepicker/">jQuery Timepicker</a> by <a href="http://trentrichardson.com">Trent Richardson</a>- lets you pick times as well as dates (as opposed to jQuery's datepicker), useful for creating events.</li> 
	</ul>
	<p>
		Thank you to all the people involved in these projects. I can only hope someone might find this one useful too.
	</p>
</div>
</div>
	
