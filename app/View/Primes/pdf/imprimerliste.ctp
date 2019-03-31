<div class="affichage" >  
<table >
<tr>
<th>Numéro</th><th>Référence</th>
<th>Libellé</th>
<th>Taux</th>
<th>Date de Prime</th>
<th>Nom d'employe</th> 
<th>Numéro d'employe</th> 
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Prime']['id'];?></td>
<td><?php echo $post['Prime']['ref'];?></td>
<td><?php echo $this->Html->link($post['Prime']['nom'],array('controller'=>'primes','action'=>'view',$post['Prime']['id'],Inflector::slug($post['Prime']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Prime']['prime']." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $post['Prime']['date'];?></td>
<td><?php echo $this->Html->link($post['Prime']['employe_nom'],array('controller'=>'primes','action'=>'view',$post['Prime']['employe_id'],Inflector::slug($post['Prime']['employe_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Prime']['employe_id'];?></td>
 
</tr>
<?php endforeach; unset($post);?>
</table>		<?php echo "<script>window.print();</script>";?>
</div>