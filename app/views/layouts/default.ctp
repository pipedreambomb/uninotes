<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __('UniNot.es: One place for everyone\'s notes -- '); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('style');
//        echo $this->Html->css('cake.generic');
//        echo $this->Html->css('uninotes');
	echo $this->Html->script('jquery-1.7.1.min.js'); // Include jQuery library > 
	echo $this->Html->script('cakebootstrap.js');
	echo $this->Html->script('bootstrap.js');
        echo $scripts_for_layout;
        ?>
	<!-- Google Analytics -->
	<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-4804110-10']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	</script>
    </head>
    <body>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
		    <ul class="nav">
                        <li>
                            <? echo $this->Html->link('UniNot.es', array('controller' => '', 'action' => 'index'), array('class' => 'brand'));?>
			</li>
                        <li>
                            <? echo $this->Html->link('Organizations', array('controller' => 'organizations', 'action' => 'index'));?>
			</li>
                        <li>
                            <? echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'));?>
                        </li>
                    </ul>
	<p id="login" class="navbar-text pull-right">
                <?php if (!empty($user)) { ?>
                    Welcome back <?php 
                    echo $this->Html->link($user['username'], array('controller' => 'users', 'action' => 'dashboard'));
		  ?>!&nbsp;<?
                    echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
                } else {
                    echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login'));
		    echo " or ";
                    echo $this->Html->link('Sign up!', array('controller' => 'users', 'action' => 'add'));
                }
                ?>
	</p>
                </div>
	</div>
</div>

<?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('auth'); ?>

<?php echo $content_for_layout; ?>

<? echo $this->Js->writeBuffer(); ?>
</body>
</html>
