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
	
	<p>Please be aware that you are now leaving this site and that UniNot.es accepts no responsibility for external websites and their content.</p>

</div>
</div>
