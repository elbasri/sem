<div class="affichage"> 
<?php 
$titre=$post['Compte']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Name de la banque: <strong><?php echo $post['Compte']['nom'];?></strong>
					</td>
					
					<td style="width:35%">ID de compte: <strong><?php echo $post['Compte']['numero'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">IBAN: <strong><?php echo $post['Compte']['iban'];?></strong>
					</td>
					
					<td style="width:35%">Code SWIFT/BIC: <strong><?php echo $post['Compte']['swift'];?></strong>
					</td>
				</tr>

			</table>	
<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>