<div class="affichage">
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Libellé</th>
<th>Localisation</th>
<th>État</th>
<th>Quantité</th>
<th>Fournisseur</th>
</tr>
<?php
$count=0;
$qte=0;
$cout=0;
$coutv=0;
 foreach($post as $post): 
$count++;
$qte=$qte+$post['Materiel']['qte'];
$cout=$cout+$post['Materiel']['cout'];
$coutv=$coutv+($post['Materiel']['prixv']*$post['Materiel']['qte']);
 ?>
<tr>
<td><?php echo $post['Materiel']['id'];?></td>
<td><?php echo $post['Materiel']['ref'];?></td>
<td><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Materiel']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Materiel']['piece_id'],Inflector::slug($post['Materiel']['piece_nom'],$remplacement='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Materiel']['datef']) echo "<font color='red'>Expiré</font>"; else echo "<font color='green'>Conservé</font>";?></td>
<td><?php echo $post['Materiel']['qte']." ";
if($post['Materiel']['type']=="2")
	echo "<strong>".$config['Configuration']['volume']."</strong>";
else if($post['Materiel']['type']=="3")
	echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>
<td><?php echo $this->Html->link($post['Materiel']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Materiel']['fournisseur_id'],Inflector::slug($post['Materiel']['fournisseur_nom'],$remplacement='_')));?></td>

</tr>
<?php endforeach; unset($post);?>
</table>
<h3>Résumé</h3>
<table>
	<tr>
		<th>Articles</th>
		<th>Quantités</th>
		<th>Prix d'achats</th>
		<th>Prix de ventes</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $qte;?></td>
		<td><?php echo $cout." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $coutv." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";
//print_r $params;
?>	
</div>