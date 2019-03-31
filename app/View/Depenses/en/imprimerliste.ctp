<div class="affichage"> 
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Date de paiement</th>
<th>Categorie</th>
<th>Compte</th>
<th>Total (TTC)</th>
</tr>
<?php 
$count=0; $tva=0; $ttc=0; $ht=0;
foreach($post as $post): 
$count++; $tva=$tva+$post['Depense']['tva'];
?>
<tr>
<td><?php echo $post['Depense']['id'];?></td>
<td><?php echo $this->Html->link($post['Depense']['ref'],array('controller'=>'depenses','action'=>'view',$post['Depense']['id'],Inflector::slug($post['Depense']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Depense']['date'];?></td>
<td><?php echo $this->Html->link($post['Depense']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Depense']['categorie_id'],Inflector::slug($post['Depense']['categorie_nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Depense']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Depense']['compte_id'],Inflector::slug($post['Depense']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Depense']['payee']." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $post['Depense']['payee']+$post['Depense']['tva']." ".$config['Configuration']['Devises']; $ttc=$ttc+($post['Depense']['payee']+$post['Depense']['tva']);$ht=$ht+($post['Depense']['payee'])?></td>
<td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>TVA</th>
		<th>HT</th>
		<th>TTC</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $tva." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ht." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>