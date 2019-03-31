<div class="affichage">
<?php 
$titre=$post['Materiel']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
 <br><h2>DONNÉES DE BASE</h2>	
			<table ><tr></tr>
				<tr>
					<td style="width:15%">Numéro d'inventaire: </td><td style="width:29%"><strong><?php echo $post['Materiel']['ref'];?></strong>
					</td>
					<td style="width:15%">Désignation: </td><td style="width:29%"><strong><?php echo $post['Materiel']['designation'];?></strong>
					</td>
				</tr>
				<tr></tr>
				<tr >
					<td style="width:15%">Fournisseur: </td><td style="width:29%"><strong><?php echo $this->Html->link($post['Materiel']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Materiel']['fournisseur_id'],Inflector::slug($post['Materiel']['fournisseur_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:15%">Conditionnement: </td><td style="width:29%"><strong><?php echo $post['Materiel']['conditionnement'];?></strong>
					</td>
				</tr>
				<tr></tr>
				<tr >
					<td style="width:15%">Date: </td><td style="width:29%"><strong><?php echo $post['Materiel']['date'];?></strong>
					</td>
					<td style="width:15%"></td><td style="width:29%"><strong></strong>
					</td>
					
				</tr>
			</table>

 <br><h2>DONNÉES DE STOCKAGE</h2>
  			<table ><tr></tr>
				<tr>
					<td style="width:15%">Localisation: </td><td style="width:29%"><strong><?php echo $this->Html->link($post['Materiel']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Materiel']['piece_id'],Inflector::slug($post['Materiel']['piece_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:15%">Emplacement: </td><td style="width:29%"><strong><?php echo $post['Materiel']['emplacement'];?></strong>
					</td>
					
				</tr>
			</table>
 <br><h2>DONNEES COMPTABLES</h2>
   			<table><tr></tr>
				<tr>
					<td style="width:15%">Quantité: </td><td style="width:29%"><strong><?php echo $post['Materiel']['qte']." ";
						if($post['Materiel']['type']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($post['Materiel']['type']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?>
						</strong>
					</td>
					
					<td style="width:15%">Prix d'achat: </td><td style="width:29%"><strong><?php echo $post['Materiel']['prix']; echo " ".$config['Configuration']['Devises']." Totale: "; echo $post['Materiel']['prix']*$post['Materiel']['qte']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
			</table>
			
<?php if($post['Materiel']['infos']!=""){?>
 <br/><h2>Plus d'informations</h2>
<?php echo $post['Materiel']['infos']; }?>
 
<?php echo "<script>window.print();</script>";?>							
	</div>	
		
</div>