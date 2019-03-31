<div class="affichage">
<?php 
$titre=$post['Materiel']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
			<table >
				<tr >
					<td style="width:35%">Numéro: <strong><?php echo $post['Materiel']['id'];?></strong>
					</td>
					
					<td style="width:35%">Fournisseur: <strong><?php echo $this->Html->link($post['Materiel']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Materiel']['fournisseur_id'],Inflector::slug($post['Materiel']['fournisseur_nom'],$remplacement='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Date: <strong><?php echo $post['Materiel']['date'];?></strong>
					</td>
					
					<td style="width:35%">
					</td>
				</tr>
			</table>
 <br><h2>DONNÉES DE BASE</h2>	
			<table >
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Materiel']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Conditionnement: <strong><?php echo $post['Materiel']['conditionnement'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Désignation: <strong><?php echo $post['Materiel']['designation'];?></strong>
					</td>
					
					<td style="width:35%"><!--Unité: --><strong><?php //echo $post['Materiel']['unite'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Fabricant: <strong><?php echo $this->Html->link($post['Materiel']['fabricant_nom'],array('controller'=>'clients','action'=>'view',$post['Materiel']['fabricant_id'],Inflector::slug($post['Materiel']['fabricant_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Poids: <strong><?php echo $post['Materiel']['poids'];?></strong>
					</td>
				</tr>
				
				<tr >
					<td style="width:35%">Ref. Fabricant: <strong><?php echo $post['Materiel']['reffabricant'];?></strong>
					</td>
					
					<td style="width:35%">Volume: <strong><?php echo $post['Materiel']['volume'];?></strong>
					</td>
				</tr>
			</table>
			
 <br><h2>DONNÉES DE CLASSIFICATION</h2>
			<table >
				<tr >
					<td style="width:35%">Famille Article: <strong><?php echo $this->Html->link($post['Materiel']['famille_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Materiel']['famille_id'],Inflector::slug($post['Materiel']['famille_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Imputation: <strong><?php echo $this->Html->link($post['Materiel']['imputation_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Materiel']['imputation_id'],Inflector::slug($post['Materiel']['imputation_nom'],$remplacement='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Marque: <strong><?php echo $this->Html->link($post['Materiel']['marque_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Materiel']['marque_id'],Inflector::slug($post['Materiel']['marque_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Article critique: <strong><?php echo $post['Materiel']['critique'];?></strong>
					</td>
				</tr>
			</table>
 <br><h2>DONNÉES DE PLANIFICATION</h2>
 			<table >
				<tr >
					<td style="width:35%">Stock Minimum: <strong><?php echo $post['Materiel']['min'];?></strong>
					</td>
					
					<td style="width:35%">Taille du lot: <strong><?php echo $post['Materiel']['taillelot'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Stock Maximum: <strong><?php echo $post['Materiel']['max'];?></strong>
					</td>
					
					<td style="width:35%">Blocage entrée: <strong><?php echo $post['Materiel']['bentree'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Stock de Sécurité: <strong><?php echo $post['Materiel']['sec'];?></strong>
					</td>
					
					<td style="width:35%">Blocage sortie: <strong><?php echo $post['Materiel']['bsortie'];?></strong>
					</td>
				</tr>
			</table>
 <br><h2>DONNÉES DE STOCKAGE</h2>
  			<table >
				<tr>
					<td style="width:35%">Localisation: <strong><?php echo $this->Html->link($post['Materiel']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Materiel']['piece_id'],Inflector::slug($post['Materiel']['piece_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Durée de conservation: <strong>
						<table>
							<tr><td>A partir le</td><td><?php echo $post['Materiel']['dated'];?></td></tr>
							<tr><td>Jusqu'à</td><td><?php echo $post['Materiel']['datef'];?></td></tr>
							<tr><td>État actuel</td><td><?php if(date('Y-m-d')>$post['Materiel']['datef']) echo "<font color='red'>Durée dépassé</font>"; else echo "<font color='green'>Conservé</font>";?></td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Emplacement: <strong><?php echo $post['Materiel']['emplacement'];?></strong>
					</td>
					
					<td style="width:35%">Classe Mat. Dangeureuse: <strong><?php echo $post['Materiel']['danger'];?></strong>
					</td>
				</tr>
			</table>
 <br><h2>DONNEES COMPTABLES</h2>
   			<table>
				<tr>
					<td style="width:35%">Quantité: <strong><?php echo $post['Materiel']['qte']." ";
						if($post['Materiel']['type']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($post['Materiel']['type']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?>
						</strong>
					</td>
					
					<td style="width:35%">Prix d'achat: <strong><?php echo $post['Materiel']['prix']; echo " ".$config['Configuration']['Devises']." Totale: "; echo $post['Materiel']['prix']*$post['Materiel']['qte']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">
					</td>
					
					<td style="width:35%">Prix de vente: <strong><?php echo $post['Materiel']['prixv']; echo " ".$config['Configuration']['Devises']." Totale: "; echo $post['Materiel']['prixv']*$post['Materiel']['qte']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
			</table>
			
 
<?php echo "<script>window.print();</script>";?>							
	</div>	
		
</div>