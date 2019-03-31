<?php
$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php   echo $this->Html->charset(); 
	?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	
	<?php
	echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
	echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
		 
		
		echo $this->fetch('meta');
	?>
 
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="stylesheet" href="css/styles.css" type="text/css" /> 

</head>

<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>
