<div class="affichage"> 
<?php 
$titre=$post['Recette']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Recette']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Date de paiement: <strong><?php echo $post['Recette']['date'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Théme payée: <strong><?php $c=$post['Recette']['article'];
						if($c == '1'){
							echo "Article du stock: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'materiels','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
						}
						else if($c == '2'){
							echo "Produit du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'produits','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
						}
						else if($c == '3'){
							echo "Service du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'services','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
						}?></strong>
					</td>
					
					<td style="width:35%">Categorie: <strong><?php echo $this->Html->link($post['Recette']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Recette']['categorie_id'],Inflector::slug($post['Recette']['categorie_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Payé à: <strong><?php echo $post['Recette']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Mode de paiement: <strong><?php echo $post['Recette']['modep'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Total (TTC): <strong><?php echo $post['Recette']['total'];?></strong>
					</td>
					
					<td style="width:35%">Compte: <strong><?php echo $this->Html->link($post['Recette']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Recette']['compte_id'],Inflector::slug($post['Recette']['compte_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">TVA en %: <strong><?php echo $post['Recette']['tvaen'];?></strong>
					</td>
					
					<td style="width:35%">TVA: <strong><?php echo $post['Recette']['tva'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Client: <strong><?php echo $this->Html->link($post['Recette']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Recette']['client_id'],Inflector::slug($post['Recette']['client_nom'],$replacement ='_')));?></strong>
						</td>
					<td style="width:35%">Description: <strong><?php echo $post['Recette']['description'];?></strong>
					</td>
				</tr>
			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>