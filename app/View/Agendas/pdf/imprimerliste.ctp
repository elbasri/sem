<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Libellé</th>
<th>Type</th>
<th>État actuel</th>
<th>La société</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Contrat']['id'];?></td>
<td><?php echo $this->Html->link($post['Contrat']['nom'],array('controller'=>'Contrats','action'=>'view',$post['Contrat']['id'],Inflector::slug($post['Contrat']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Contrat']['type'];?></td>
<td><?php if(date('Y-m-d')>$post['Contrat']['datef']) echo "<font color='red'>Contrat expiré</font>"; else echo "<font color='green'>Contrat valide</font>";?></td>
<td><?php echo $this->Html->link($post['Contrat']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Contrat']['client_id'],Inflector::slug($post['Contrat']['client_nom'],$replacement ='_')));?></td>

</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>