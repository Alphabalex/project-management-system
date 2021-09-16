<?php $cakeDescription = __d('cake_dev', 'Project management system'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php
	echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon'));
	echo $this->Html->css(['bootstrap.min', 'font-awesome.min', 'main', 'color_skins']);
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body class="theme-orange">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
					<div class="top"></div>
					<?php echo $this->Flash->render(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
