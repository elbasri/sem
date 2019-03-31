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

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	
	<?php
	echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
	echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
		//echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('style.css');
		echo $this->Html->css('local-fr.css');
		echo $this->Html->css('slider/bjqs.css');
		echo $this->Html->css('slider/demo.css');
		echo $this->Html->css('debug_toolbar.css');
		echo $this->Html->css('billet-style.css');
		
		echo $this->Html->script('scripts.js');
		echo $this->Html->script('slider/js/jquery-1.7.1.min.js');
		echo $this->Html->script('slider/js/bjqs-1.3.min.js');
		echo $this->Html->script('jquery.min.js');
		//echo $this->Html->script('slider/js/libs/jquery.secret-source.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>


</head>
<body>
<div class="box1" >
<?php echo $this->Element('bheader');?>
<div style="clear:both;"></div>
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
<div style="clear:both;"></div>
<?php echo $this->Element('bfooter');?>
	<?php //echo $this->element('sql_dump'); ?>
	</div>
</body>
</html>
