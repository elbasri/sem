<h2><?php ?></h2>
<p class="error" style="font-size:20px;text-align:center">
	<strong><?php //echo __d('cake', 'Error'); 
	echo 'un fichier manquant {VW}'; ?> </strong>
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