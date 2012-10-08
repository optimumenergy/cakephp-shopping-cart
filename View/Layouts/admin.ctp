<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('bootstrap.css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css', 'admin.css', 'bootstrap-responsive.css')); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<?php echo $this->Html->script(array('bootstrap.min.js')); ?>

<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/admin/">SHOP ADMIN</a>

				<div class="nav-collapse">
					<ul class="nav">

						<li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index', 'admin' => true)); ?></li>
						<li><?php echo $this->Html->link('Orders', array('controller' => 'orders', 'action' => 'index', 'admin' => true)); ?></li>
						<li><?php echo $this->Html->link('Orders Items', array('controller' => 'order_items', 'action' => 'index', 'admin' => true)); ?></li>
						<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?></li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link('TEST 1', '#'); ?></li>
								<li><?php echo $this->Html->link('TEST 2', '#'); ?></li>
								<li><?php echo $this->Html->link('TEST 3', '#'); ?></li>
							</ul>
						</li>

					</ul>
				</div>

				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i> Admin
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					<li><a href="http://www.google.com/analytics/" target="_blank"><i class="icon-align-left"></i> Analytics</a></li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link('<i class=\'icon-off\'></i> Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('escape' => false)); ?></li>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<div class="container-fluid content">

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>

	<br />
	<br />

	<footer>
		<p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
	</footer>

	</div>

</body>
</html>

