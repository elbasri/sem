<div class="affichage">
<?php 
$titre=$post['Inventaire']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
			<table >
				<tr >
					<td style="width:35%">Numéro: <strong><?php echo $post['Inventaire']['id'];?></strong>
					</td>
					
					<td style="width:35%">Référence: <strong><?php echo $post['Inventaire']['ref'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Créé le: <strong><?php echo $post['Inventaire']['created'];?></strong>
					</td>
					
					<td style="width:35%">Modifié le: <strong><?php echo $post['Inventaire']['modified'];?></strong>
					</td>
				</tr>
			</table>
 <br><h2>Générale</h2>	
			<table >
				<tr >
					<td style="width:35%">Désignation: <strong><?php echo $post['Inventaire']['designation'];?></strong>
					</td>
					
					<td style="width:35%">Catégorie: <strong><?php echo $post['Inventaire']['categorie'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Conditionnement: <strong><?php echo $post['Inventaire']['conditionnement'];?></strong>
					</td>
					
					<td style="width:35%"></td>
				</tr>
				<tr >
					<td style="width:35%">Fabricant: <strong><?php echo $this->Html->link($post['Inventaire']['fabricant_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fabricant_id'],Inflector::slug($post['Inventaire']['fabricant_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Etat: <strong><?php echo $post['Inventaire']['etat'];?></strong>
					</td>
				</tr>
				
				<tr >
					<td style="width:35%">Ref. Fabricant: <strong><?php echo $post['Inventaire']['reffabricant'];?></strong>
					</td>
					
					<td style="width:35%">Niveau: <strong><?php echo $post['Inventaire']['niveau'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Famille: <strong><?php echo $this->Html->link($post['Inventaire']['famille_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Inventaire']['famille_id'],Inflector::slug($post['Inventaire']['famille_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Marque: <strong><?php echo $this->Html->link($post['Inventaire']['marque_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Inventaire']['marque_id'],Inflector::slug($post['Inventaire']['marque_nom'],$remplacement='_')));?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Localisation: <strong>
						<table>
							<tr><td>Locale</td><td><?php echo $this->Html->link($post['Inventaire']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Inventaire']['piece_id'],Inflector::slug($post['Inventaire']['piece_nom'],$remplacement='_')));?></td></tr>
							<tr><td>Emplacement</td><td><?php echo $post['Inventaire']['emplacement'];?></td></tr>
						</table>
					</td>
					<td style="width:35%"></td>
				</tr>
			</table>
			
 <br><h2>Administratif</h2>
			<table>
				<tr>
					<td style="width:35%">Fournisseur: <strong><?php echo $this->Html->link($post['Inventaire']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fournisseur_id'],Inflector::slug($post['Inventaire']['fournisseur_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Facture: <strong><?php echo $this->Html->link($post['Inventaire']['facture_nom'],array('controller'=>'factures','action'=>'view',$post['Inventaire']['facture_id'],Inflector::slug($post['Inventaire']['facture_nom'],$remplacement='_')));?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Contrat de garantie: <strong><?php if($post['Inventaire']['contratg_id']!=0) echo $this->Html->link($post['Inventaire']['contratg_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contratg_id'],Inflector::slug($post['Inventaire']['contratg_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
					
					<td style="width:35%">Contrat de Maintenance: <strong><?php if($post['Inventaire']['contratm_id']!=0) echo $this->Html->link($post['Inventaire']['contratm_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contratm_id'],Inflector::slug($post['Inventaire']['contratm_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
				</tr>
				<tr>
					<td style="width:35%">Contrat d'assura,ce: <strong><?php if($post['Inventaire']['contrata_id']!=0) echo $this->Html->link($post['Inventaire']['contrata_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contrata_id'],Inflector::slug($post['Inventaire']['contrata_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
					
					<td style="width:35%">Contrat de location: <strong><?php if($post['Inventaire']['contratl_id']!=0) echo $this->Html->link($post['Inventaire']['contratl_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contratl_id'],Inflector::slug($post['Inventaire']['contratl_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
				</tr>
			</table>
 <br><h2>Donnée Comptables</h2>
   			<table>
				<tr>
					<td style="width:35%">Quantité: <strong><?php echo $post['Inventaire']['qte']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
					
					<td style="width:35%">Valeur Marchande: <strong><?php echo $post['Inventaire']['prixv']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				
				<tr>
					<td style="width:35%">Prix d'achat: <strong><?php echo $post['Inventaire']['prix']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
					
					<td style="width:35%">Prix Totale: <strong><?php echo $post['Inventaire']['prix']*$post['Inventaire']['qte']; echo " ".$config['Configuration']['Devises'];?></strong></td>
				</tr>
			</table>
			
 
<?php echo "<script>window.print();</script>";?>							
	</div>	
		
</div>