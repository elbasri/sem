<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Intitulé</th>
<th>Date</th>
<th>Emetteur/Récepteur</th>
<th>Type</th>
<th>Montant</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Commande']['id'];?></td>
<td><?php echo $post['Commande']['reference'];?></td>
<td><?php echo $this->Html->link($post['Commande']['nom'],array('controller'=>'commandes','action'=>'view',$post['Commande']['id'],Inflector::slug($post['Commande']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Commande']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Commande']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Commande']['client_id'],Inflector::slug($post['Commande']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Commande']['type'];?></td>
<td><?php echo $post['Commande']['montant']." ".$post['Commande']['devise'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
		<?php echo "<script>window.print();</script>";?>	
</div>