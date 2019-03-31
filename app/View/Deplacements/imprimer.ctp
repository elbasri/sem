<div class="affichage"> 
<?php 
$titre=$post['Deplacement']['ref'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
<h2>Description du trajet</h2>	
			<table>
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Deplacement']['ref'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">Pays de destination: <strong><?php echo $post['Deplacement']['pays'];?></strong>
					</td>
					
					<td style="width:35%">Description: <strong><?php echo $post['Deplacement']['description'];?></strong>
					</td>
				</tr>
				
			</table>
<h2>Indemnités de déplacement</h2>
			<table>
				<tr >
					<td style="width:35%">Depuis le: <strong><?php echo $post['Deplacement']['dated'];?></strong>
					</td>
					
					<td style="width:35%">À: <strong><?php echo $post['Deplacement']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Taux: <strong><?php echo $post['Deplacement']['taux'];?></strong>
					</td>
					
				</tr>
			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>