<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('admin.css')); ?>
<?php echo $this->Html->script(array('http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js')); ?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>

	<div id="top">
		<div id="menu">
			<?php echo $this->Html->link('Orders', array('controller' => 'orders', 'action' => 'index', 'admin' => true)); ?> &nbsp;
			<?php echo $this->Html->link('Orders Items', array('controller' => 'order_items', 'action' => 'index', 'admin' => true)); ?>  &nbsp;
			<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?>
		</div>
	</div>

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>

	<br /><br />

	<div id+"footer">&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></div>

</body>
</html>
