<div class="affichage" > 
<table >
<tr>
<th>Numéro</th><th>Référence</th>
<th>Raison de congés</th>
<th>Type de congés</th>
<th>État actuel</th>
<th>L'employe</th> 
<th>Numéro d'employe</th> 
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Vacance']['id'];?></td>
<td><?php echo $post['Vacance']['ref'];?></td>
<td><?php echo $this->Html->link($post['Vacance']['nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['id'],Inflector::slug($post['Vacance']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Vacance']['type'];?></td>
<td><?php if(date('Y-m-d')>$post['Vacance']['datef']) echo "<font color='red'>Congés Terminé</font>"; else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated'])echo "<font color='green'>Congés encours</font>"; else if (date('Y-m-d')<$post['Vacance']['dated'])echo "<font color='blue'>Congés à venir</font>";?></td>
<td><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></td>
 <td><?php echo $post['Vacance']['employe_id'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>		<?php echo "<script>window.print();</script>";?>
</div>