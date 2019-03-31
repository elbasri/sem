<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>Coût</th>
<th>État actuel</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Projet']['id'];?></td>
<td><?php echo $post['Projet']['ref'];?></td>
<td><?php echo $this->Html->link($post['Projet']['nom'],array('controller'=>'projets','action'=>'view',$post['Projet']['id'],Inflector::slug($post['Projet']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Projet']['cout']; echo " ".$config['Configuration']['Devises'];?></td>
<td><?php if(date('Y-m-d')>$post['Projet']['datef']) echo "<font color='red'>Projet Terminé</font>"; else if(date('Y-m-d')<$post['Projet']['datef'] && date('Y-m-d')>$post['Projet']['dated'])echo "<font color='green'>Projet encours</font>"; else if (date('Y-m-d')<$post['Projet']['dated'])echo "<font color='blue'>Projet à venir</font>";?></td>

</tr>
<?php endforeach; unset($post);?>
</table><?php echo "<script>window.print();</script>";?>
</div>