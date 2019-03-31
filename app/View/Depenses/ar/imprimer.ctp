<div class="affichage"> 
<?php 
$titre=$post['Depense']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Depense']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Date de paiement: <strong><?php echo $post['Depense']['date'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Categorie: <strong><?php echo $this->Html->link($post['Depense']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Depense']['categorie_id'],Inflector::slug($post['Depense']['categorie_nom'],$replacement ='_')));?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">Payé de: <strong><?php echo $post['Depense']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Compte: <strong><?php echo $this->Html->link($post['Depense']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Depense']['compte_id'],Inflector::slug($post['Depense']['compte_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Fournisseur: <strong><?php echo $this->Html->link($post['Depense']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Depense']['fournisseur_id'],Inflector::slug($post['Depense']['fournisseur_nom'],$replacement ='_')));?></strong>
					</td>
					
					<td style="width:35%">
					</td>
				</tr>
				<tr >
					<td style="width:35%">TVA en %: <strong><?php echo $post['Depense']['tvaen'];?></strong>
					</td>
					
					<td style="width:35%">TVA: <strong><?php echo $post['Depense']['tva']." ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Total HT: <strong><?php echo $post['Depense']['payee']." ".$config['Configuration']['Devises'];?></strong>
					</td>
					<td style="width:35%">Total TTC: <strong><?php echo $post['Depense']['payee']+$post['Depense']['tva']." ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Description: <strong><?php echo $post['Depense']['description'];?></strong>
					</td>
					
					<td style="width:35%">
					</td>
				</tr>

			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>