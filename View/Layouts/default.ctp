<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('bootstrap.min.css', 'css.css', 'bootstrap-responsive.min.css')); ?>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min.js', 'js.js', 'search.js')); ?>
<?php echo $this->App->js(); ?>
<?php echo $this->fetch('meta'); ?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">SHOP</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><?php echo $this->Html->link('Home', array('controller' => 'products', 'action' => 'view')); ?></li>
						<li><?php echo $this->Html->link('Shopping Cart', array('controller' => 'shop', 'action' => 'cart')); ?></li>
					</ul>
				</div>
				<div class="btn-group pull-right">
					<?php //echo $this->Form->create('Product', array('type' => 'GET', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>
					<?php //echo $this->Form->input('search', array('label' => false, 'div' => false, 'autocomplete' => 'off')); ?>
					<?php //echo $this->Form->submit('Search', array('div' => false, 'class' => 'submit')); ?>
					<?php //echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

		<br />
		<br />

		<div id="footer">
			<?php echo $this->Html->link($this->Html->image('cake.power.gif', array('alt' => 'CakePHP', 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)); ?>
			<br />
			<br />
			&copy;
			<?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?>
		</div>

		<div class="row">
			<div class="span12">
				<?php echo $this->element('sql_dump'); ?>
			</div>
		</div>


	</div>


</body>
</html>
