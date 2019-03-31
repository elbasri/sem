<div class="affichage" align="center">
<?php
if(isset($letest)){
if($letest==1){
		$subject="Message ";
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
		
		mail($email, $subject, $body,$headers);
					//echo "<script>alert('Bien fait')</script>";
				}
	}
?>

</div>