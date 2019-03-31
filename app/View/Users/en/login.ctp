<h1><?php  echo $this->Session->flash('Auth'); ?></h1>
<div class="affichage" align="center">
<?php
if(isset($letest)){
if($letest==1){
					/*$msg="Salut ".$nom." <br/>Bienvenue sur Votre Codeur,<br> Votre compte est en attente d\'activation.<br> Pour activer votre compte, merci de cliquer sur le lien suivant: http://www.votrecodeur.com/users/activation/".$username;
					
					$from='noreply@votrecodeur.com';
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= "From: $from \r\n";
					$headers .= "Reply-To: $from \r\n";
					
					mail($email, '', $msg,$headers);*/
		$domain = "http://".$_SERVER['SERVER_NAME'];
		$subject="Activation de votre compte sur Votre Codeur";
		$from = "no-reply@votrecodeur.com";
		//$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		$body = "Salut $nom,\n".
		"Bienvenue sur Votre Codeur.\n".
		"Votre compte est en attente d\'activation \n".
		"Pour activer votre compte, merci de cliquer sur le lien suivant: \n".
		"http://membres.votrecodeur.com/users/activation/$username/$cle\n ".
		"\n".
		"Cordialement.\n";	
		
		$headers = "From: Votre Codeur <$from> \r\n";
		$headers .= "Reply-To: $from \r\n";
		
		//mail($email, $subject, $body,$headers);
					//echo "<script>alert('Bien fait')</script>";
				}
	}
	?>
 <?php echo $this->Form->create('User');?>

		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'your username','title'=>'your username')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'your username'));?>
					</td>
					</tr>
					<tr >
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'your password','title'=>'your password')); ?>
					</td>
					<td><?php echo $this->Form->input('password',array('label'=>'your password'));?>
					</td>
					
				</tr>
			</table>								
		</div>	
<?php echo $this->Form->end('Login'); ?>
</div>