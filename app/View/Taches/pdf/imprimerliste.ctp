<div class="affichage" >  
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>État actuel</th>
<th>L'employe</th> 
<th>Le Projet</th> 
<th>Numéro d'employe</th> 
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Tache']['id'];?></td>
<td><?php echo $post['Tache']['ref'];?></td>
<td><?php echo $this->Html->link($post['Tache']['nom'],array('controller'=>'taches','action'=>'view',$post['Tache']['id'],Inflector::slug($post['Tache']['nom'],$replacement ='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Tache']['datef']) echo "<font color='red'>Tache Terminé</font>"; else if(date('Y-m-d')<=$post['Tache']['datef'] && date('Y-m-d')>=$post['Tache']['dated'])echo "<font color='green'>Tache encours</font>"; else if (date('Y-m-d')<$post['Tache']['dated'])echo "<font color='blue'>Tache à venir</font>";?></td>
<td><?php echo $this->Html->link($post['Tache']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Tache']['employe_id'],Inflector::slug($post['Tache']['employe_nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Tache']['projet_nom'],array('controller'=>'projets','action'=>'view',$post['Tache']['projet_id'],Inflector::slug($post['Tache']['projet_nom'],$replacement ='_')));?></td>
 <td><?php echo $post['Tache']['employe_id'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>		<?php echo "<script>window.print();</script>";?>
</div>