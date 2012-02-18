<div id="home">
	
	<h1>External document: <? echo $document['Document']['text']; ?></h1>
	
	<? echo $this->Html->script('jquery-1.7.1.min.js'); // Include jQuery library > 
	$myScript = "$(function(){
		  var count = 5;
		    countdown = setInterval(function(){
			        $('#countdown').html(count.toString());
				    if (count == 0) {
					          window.location = '" . $document['Document']['url'] . "';
						      }
		      count--;
		    }, 1000);
		  });
		";
	$this->Js->buffer($myScript);
	echo $this->Js->writeBuffer(); // Write cached scripts ?>

	<p>Redirecting you to <? echo $this->Html->link($document['Document']['url']); ?> in <span id="countdown">5</span> seconds.</p>
	
	<p>Please be aware that you are now leaving this site and that UniNot.es accepts no responsibility for external websites and their content.</p>

</div>
