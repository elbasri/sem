<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>Localisation</th>
<th>État</th>
<th>Quantité</th>
<th>Fournisseur</th>
</tr>
<?php foreach($post as $post): ?>
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
<?php echo "<script>window.print();</script>";
//print_r $params;
?>	
</div>