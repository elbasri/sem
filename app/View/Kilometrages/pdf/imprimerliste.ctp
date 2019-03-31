<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date</th>
<th>Type</th>
<th>Véhicule</th>
<th>Distance</th>
<th>Totale (TTC)</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Kilometrage']['id'];?></td>
<td><?php echo $this->Html->link($post['Kilometrage']['ref'],array('controller'=>'kilometrages','action'=>'view',$post['Kilometrage']['id'],Inflector::slug($post['Kilometrage']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Kilometrage']['date'];?></td>
<td><?php echo $post['Kilometrage']['type'];?></td>
<td><?php echo $this->Html->link($post['Kilometrage']['inventaire_nom'],array('controller'=>'Inventaires','action'=>'view',$post['Kilometrage']['inventaire_id'],Inflector::slug($post['Kilometrage']['inventaire_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Kilometrage']['distance']." ".$config['Configuration']['distance'];?></td>
<td><?php echo $post['Kilometrage']['total']." ".$config['Configuration']['Devises'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>