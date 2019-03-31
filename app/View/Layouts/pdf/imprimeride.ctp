<?php
$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php   echo $this->Html->charset(); 
			echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
			echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
	?>
	<title>
		<?php echo $title_for_layout; 
		$params[0][0] =  $title_for_layout.".pdf";
		//$this->set($params);
		?>
	</title>
</head>

<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>