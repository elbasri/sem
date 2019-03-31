<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date</th>
<th>Type</th>
<th>Compte</th>
<th>Montant (TTC)</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Saisir']['id'];?></td>
<td><?php echo $this->Html->link($post['Saisir']['ref'],array('controller'=>'saisirs','action'=>'view',$post['Saisir']['id'],Inflector::slug($post['Saisir']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Saisir']['date'];?></td>
<td><?php echo $post['Saisir']['type'];?></td>
<td><?php echo $this->Html->link($post['Saisir']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Saisir']['compte_id'],Inflector::slug($post['Saisir']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Saisir']['montant']." ".$config['Configuration']['Devises'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>