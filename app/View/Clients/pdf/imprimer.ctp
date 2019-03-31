<div class="affichage">
<?php 
$titre=$user['Client']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $user['Client']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Societé: <strong><?php echo $user['Client']['nom'];?></strong>
					</td>
					
				</tr>
				<tr >
			
					<td style="width:35%">Contact: <strong><?php echo $user['Client']['civilite']." ".$user['Client']['prenom']?></strong>
					</td>
					
					<td>Téléphone: <strong><?php echo $user['Client']['tel'];?></strong>
					</td>
				</tr>
				
				<tr>
				
					<td>Pays: <strong><?php echo $user['Client']['pays'];?></strong>
					</td>
					
					<td>Ville: <strong><?php echo $user['Client']['ville'];?></strong>
					</td>
				</tr>
				<tr>
					<td>Code Postale: <strong><?php echo $user['Client']['codep'];?></strong>
					</td>
					
					<td>Adresse: <strong><?php echo $user['Client']['adressepostale'];?></strong>
					</td>
				</tr>

				<tr>
					<td>Email: <strong><?php echo $user['Client']['email'];?></strong>
					</td>
				</tr>

				
			</table>
<?php echo "<script>window.print();</script>";?>			
	</div>	
		
</div>