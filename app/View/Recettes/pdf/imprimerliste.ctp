<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date de paiement</th>
<th>Categorie</th>
<th>Théme payée</th>
<th>Compte</th>
<th>Total (TTC)</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Recette']['id'];?></td>
<td><?php echo $this->Html->link($post['Recette']['ref'],array('controller'=>'recettes','action'=>'view',$post['Recette']['id'],Inflector::slug($post['Recette']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Recette']['date'];?></td>
<td><?php echo $this->Html->link($post['Recette']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Recette']['categorie_id'],Inflector::slug($post['Recette']['categorie_nom'],$replacement ='_')));?></td>
<td><?php 
		$c=$post['Recette']['article'];
			if($c == '1'){
				echo "Article du stock: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'materiels','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
			else if($c == '2'){
				echo "Produit du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'produits','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
			else if($c == '3'){
				echo "Service du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'services','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
;?></td>
<td><?php echo $this->Html->link($post['Recette']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Recette']['compte_id'],Inflector::slug($post['Recette']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Recette']['total'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>