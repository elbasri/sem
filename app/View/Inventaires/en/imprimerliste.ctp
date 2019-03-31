<div class="affichage">
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Libellé</th>
<th>Magasin</th>
<th>Créé le</th>
<th>Modifié le</th>
<th>Fournisseur</th>
</tr>
<?php
$count=0; $qte=0; $cout=0;$coutv=0;
 foreach($post as $post): 
$count++;
$qte=$qte+$post['Inventaire']['qte'];
$cout=$cout+$post['Inventaire']['cout'];
$coutv=$coutv+($post['Inventaire']['prixv']*$post['Inventaire']['qte']);
 ?>
<tr>
<td><?php echo $post['Inventaire']['id'];?></td>
<td><?php echo $post['Inventaire']['ref'];?></td>
<td><?php echo $this->Html->link($post['Inventaire']['nom'],array('controller'=>'inventaires','action'=>'view',$post['Inventaire']['id'],Inflector::slug($post['Inventaire']['nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Inventaire']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Inventaire']['piece_id'],Inflector::slug($post['Inventaire']['piece_nom'],$remplacement='_')));?></td>
<td><?php echo $post['Inventaire']['created'];?></td>
<td><?php echo $post['Inventaire']['modified'];?></td>
<td><?php echo $this->Html->link($post['Inventaire']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fournisseur_id'],Inflector::slug($post['Inventaire']['fournisseur_nom'],$remplacement='_')));?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Les biens</th>
		<th>Quantités</th>
		<th>Prix d'achats</th>
		<th>Valeurs Marchandes</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $qte;?></td>
		<td><?php echo $cout." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $coutv." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>	
</div>