<div class="affichage">
<?php 
$titre=$post['Piece']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Piece']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Espace de Localisation: <strong><?php echo $post['Piece']['espace'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">ID d l'étage: <strong><?php echo $post['Piece']['etage'];?></strong>
					</td>
					
					<td style="width:35%">ID de porte: <strong><?php echo $post['Piece']['porte'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">L'immeuble: <strong><?php echo $post['Piece']['immeuble'];?></strong>
					</td>
					
					<td style="width:35%">L'adresse postale: <strong><?php echo $post['Piece']['adresse'];?></strong>
					</td>
					
				</tr>
				
			</table>	
<br><h2>Plus d'informations:</h2> 
<?php echo $post['Piece']['infos'];?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>