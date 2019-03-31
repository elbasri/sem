<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>Magasin</th>
<th>Créé le</th>
<th>Modifié le</th>
<th>Fournisseur</th>
</tr>
<?php foreach($post as $post): ?>
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
<?php echo "<script>window.print();</script>";?>	
</div>