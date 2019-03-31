<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Libellé</th>
<th>État actuel</th>
<th>L'article</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Maintenance']['id'];?></td>
<td><?php echo $this->Html->link($post['Maintenance']['nom'],array('controller'=>'maintenances','action'=>'view',$post['Maintenance']['id'],Inflector::slug($post['Maintenance']['nom'],$replacement ='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Maintenance']['datef']) echo "<font color='red'>Maintenance Terminé</font>"; else if(date('Y-m-d')<=$post['Maintenance']['datef'] && date('Y-m-d')>=$post['Maintenance']['dated'])echo "<font color='green'>Maintenance encours</font>"; else if (date('Y-m-d')<$post['Maintenance']['dated'])echo "<font color='blue'>Maintenance planifié</font>";?></td>
<td><?php echo $this->Html->link($post['Maintenance']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Maintenance']['materiel_id'],Inflector::slug($post['Maintenance']['materiel_nom'],$replacement ='_')));?></td>

</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>