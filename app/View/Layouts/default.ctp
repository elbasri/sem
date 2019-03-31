<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html> 
<head>
	<?php   echo $this->Html->charset(); 
			echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
			echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
			echo $this->Html->css('screen.css');  
			
	?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	

	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/jquery.bxslider.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/styles.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/github.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/stylo.css" type="text/css" />
 
	<script src="<?=$this->Html->url('/js')?>/jquery.min.js"></script>
	
	
	<script src="<?=$this->Html->url('/js')?>/jquery.bxslider.js"></script>
	<script src="<?=$this->Html->url('/js')?>/rainbow.min.js"></script>
	<script src="<?=$this->Html->url('/js')?>/scripts.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $config['Configuration']['analytics'];?>', 'auto');
  ga('send', 'pageview');

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59421226-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body class="home">
<?php 
if($this->Session->read('Auth.User.id'))
	echo $this->Element('adminheader');
else
	echo $this->Element('header');
?>
	<section id="main">
		<div class="inner clearfix">
<div align="center"><?php echo $this->Session->flash(); ?></div>
<?php echo $this->fetch('content'); ?>

</div>
	</section>
<?php echo $this->Element('footer');?>
	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
