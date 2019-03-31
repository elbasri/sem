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
	
		echo $this->Html->css('screen.css');  
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?> 
 
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	 
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/styles.css" type="text/css" /> 
</head>

<body class="home">
<?php echo $this->Element('imprimerheader');?>
<div align="center"><?php echo $this->Session->flash(); ?></div>
<section id="mains">
<div class="inner clearfix">
<?php echo $this->fetch('content'); ?>
</div>
</section>
	
<?php echo $this->Element('imprimerfooter');?>
	<?php //echo $this->element('sql_dump'); ?>
 	
<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>
</body>
</html>
