<div class="affichage"> 
<?php 
$titre=$post['Kilometrage']['ref'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
<h2>Description du déplacement</h2>		
			<table>
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Kilometrage']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Véhicule: <strong><?php echo $this->Html->link($post['Kilometrage']['inventaire_nom'],array('controller'=>'inventaires','action'=>'view',$post['Kilometrage']['inventaire_id'],Inflector::slug($post['Kilometrage']['inventaire_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Type: <strong><?php echo $post['Kilometrage']['type'];?></strong>
					</td>
					
					<td style="width:35%">voyageurs: <strong><?php echo $post['Kilometrage']['voyageurs'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Date: <strong><?php echo $post['Kilometrage']['date'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">Trajet: <strong><?php echo $post['Kilometrage']['trajet'];?></strong>
					</td>
					<td style="width:35%">Description: <strong><?php echo $post['Kilometrage']['description'];?></strong>
					</td>
					
				</tr>
			</table>
<h2>Relevé du compteur</h2>	
			<table>
				<tr >
					<td style="width:35%">Départ: <strong><?php echo $post['Kilometrage']['depart'];?></strong>
					</td>
					
					<td style="width:35%">Arrivée: <strong><?php echo $post['Kilometrage']['arrivee'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Distance: <strong><?php echo $post['Kilometrage']['distance'];?></strong>
					</td>
					
					<td style="width:35%">Taux: <strong><?php echo $post['Kilometrage']['taux'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Totale (TTC): <strong><?php echo $post['Kilometrage']['total'];?></strong>
					</td>
					
				</tr>

			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>