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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __('UniNot.es: One place for everyone\'s notes -- '); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');
        echo $this->Html->css('uninotes');

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
<meta name="google-site-verification" content="RvwduHvlA-v5gXI3yz3DeEU7MG9j1ssIQmoL0AHr1V0" />
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
    <?php echo $this->Html->image("logo.png", array(
    'alt' => "UniNot.es logo",
    'url' => array('controller' => 'pages', 'action' => 'display', 'home'),
    'id' => 'logo'
    )); ?>
- one place for everyone's notes &trade;
                </h1>

                <div id="navlinks">
                    <ul class="inline-headings">
                        <li>
                            <? echo $this->Html->link('Organizations', array('controller' => 'organizations', 'action' => 'index'));?>
                        </li>
                        <li>
                            <? echo $this->Html->link('Subjects', array('controller' => 'subjects', 'action' => 'index'));?>
                        </li>
                        <li>
                            <? echo $this->Html->link('Events', array('controller' => 'events', 'action' => 'index'));?>
                        </li>
                        <li>
                            <? echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'));?>
                        </li>
                    </ul>
                </div>
                <div id="login">
                <?php if (!empty($user)) { ?>
                    Welcome back <?php echo $user['username']; ?>!

                    <?php
                    echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
                } else {
                    echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login'));
		    echo " or ";
                    echo $this->Html->link('Sign up!', array('controller' => 'users', 'action' => 'add'));
                }
                ?>
                </div>
            </div>
            <div id="content">
		    <div id="innerContent">


		<div id='breadcrumbs'>
			<? echo $this->Html->getCrumbs(' > ','Home');?> 
		</div>

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $content_for_layout; ?>

		    </div>
            </div>
            <div id="footer">
                <?php
                echo $this->Html->link(
                        $this->Html->image('cake.power.gif', array('alt' => __('CakePHP: the rapid development php framework', true), 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
                );
                ?>
            </div>
        </div>
<?php //echo $this->element('sql_dump'); ?>
    </body>
</html>