<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Depuis le</th>
<th>À</th>
<th>Pays</th>
<th>Totale (TTC)</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Deplacement']['id'];?></td>
<td><?php echo $this->Html->link($post['Deplacement']['ref'],array('controller'=>'deplacements','action'=>'view',$post['Deplacement']['id'],Inflector::slug($post['Deplacement']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Deplacement']['dated'];?></td>
<td><?php echo $post['Deplacement']['datef'];?></td>
<td><?php echo $post['Deplacement']['pays'];?></td>
<td><?php echo $post['Deplacement']['total']." ".$config['Configuration']['Devises'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>