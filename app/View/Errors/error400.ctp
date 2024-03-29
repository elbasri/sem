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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php ?></h2>
<p class="error" style="font-size:20px;text-align:center">
	<strong><?php //echo __d('cake', 'Error'); 
	echo $message; ?> </strong>
	<?php /*printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	);*/
	
	?>
</p>
<?php
echo $this->element('404');
/*if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;*/
?>
