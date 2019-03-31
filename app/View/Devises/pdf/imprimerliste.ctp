<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Intitulé</th>
<th>Date</th>
<th>Client</th>
<th>Type</th>
<th>Montant</th>
<th>Etat</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Devise']['id'];?></td>
<td><?php echo $post['Devise']['reference'];?></td>
<td><?php echo $this->Html->link($post['Devise']['nom'],array('controller'=>'devises','action'=>'view',$post['Devise']['id'],Inflector::slug($post['Devise']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Devise']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Devise']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Devise']['client_id'],Inflector::slug($post['Devise']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Devise']['type'];?></td>
<td><?php echo $post['Devise']['montant']." ".$post['Devise']['devise'];?></td>
<td><?php echo $post['Devise']['etat'];?></td>

</tr>
<?php endforeach; unset($post);?>
</table>	
</table>	
		<?php echo "<script>window.print();</script>";?>	
</div>