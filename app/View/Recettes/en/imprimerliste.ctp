<div class="affichage"> 
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Date de paiement</th>
<th>Categorie</th>
<th>Théme payée</th>
<th>Compte</th>
<th>Total HT</th>
<th>Total TTC</th>
</tr>
<?php 
$count=0;$counta=0;$countp=0;$counts=0; $tva=0; $ttc=0; $ht=0; $tvaa=0; $tvap=0; $tvas=0; $ttca=0; $ttcp=0; $ttcs=0; $hta=0; $htp=0; $hts=0;
foreach($post as $post): 
$count++; $tva=$tva+$post['Recette']['tva']; $ttc=$ttc+$post['Recette']['total']+$post['Recette']['tva']; $ht=$ht+$post['Recette']['total'];
?>
<tr>
<td><?php echo $post['Recette']['id'];?></td>
<td><?php echo $this->Html->link($post['Recette']['ref'],array('controller'=>'recettes','action'=>'view',$post['Recette']['id'],Inflector::slug($post['Recette']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Recette']['date'];?></td>
<td><?php echo $this->Html->link($post['Recette']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Recette']['categorie_id'],Inflector::slug($post['Recette']['categorie_nom'],$replacement ='_')));?></td>
<td><?php 
		$c=$post['Recette']['article'];
			if($c == '1'){
				$counta++;$tvaa=$tvaa+$post['Recette']['tva']; $ttca=$ttca+$post['Recette']['total']+$post['Recette']['tva']; $hta=$hta+$post['Recette']['total'];
				echo "Article du stock: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'materiels','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
			else if($c == '2'){
				$countp++;$tvap=$tvap+$post['Recette']['tva']; $ttcp=$ttcp+$post['Recette']['total']+$post['Recette']['tva']; $htp=$htp+$post['Recette']['total'];
				echo "Produit du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'produits','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
			else if($c == '3'){
				$counts++;$tvas=$tvas+$post['Recette']['tva']; $ttcs=$ttcs+$post['Recette']['total']+$post['Recette']['tva']; $hts=$hts+$post['Recette']['total'];
				echo "Service du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'services','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
;?></td>
<td><?php echo $this->Html->link($post['Recette']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Recette']['compte_id'],Inflector::slug($post['Recette']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Recette']['total']." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $post['Recette']['total']+$post['Recette']['tva']." ".$config['Configuration']['Devises'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>Stock</th>
		<th>Produits</th>
		<th>Services</th>
		<th>TVA</th>
		<th>HT</th>
		<th>TTC</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Number: ".$counta."<br>TVA: ".$tvaa." ".$config['Configuration']['Devises']."<br>HT: ".$hta." ".$config['Configuration']['Devises']."<br>TTC: ".$ttca." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$countp."<br>TVA: ".$tvap." ".$config['Configuration']['Devises']."<br>HT: ".$htp." ".$config['Configuration']['Devises']."<br>TTC: ".$ttcp." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$counts."<br>TVA: ".$tvas." ".$config['Configuration']['Devises']."<br>HT: ".$hts." ".$config['Configuration']['Devises']."<br>TTC: ".$ttcs." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $tva." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ht." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>