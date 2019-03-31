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
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<style>
table{
width:100% !important;
}
td{
   border: 0.5px solid black;
} 
th{
   background:black;
   color:white;
} 
</style>
</head>

<body class="home">
<?php echo $this->Element('imprimerbheader');?>
<?php echo $this->Session->flash(); ?>
<section id="mains">
<div class="inner clearfix">
<?php echo $content_for_layout; ?>
</div>
</section>
	
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>