<div class="affichage" >  
<table >
<tr>
<th>ID</th><th>Reference</th>
<th>Libellé</th>
<th> Rate </th>
<th>Date de Prime</th>
<th>The employee</th>  
</tr>
<?php 
$count=0; $ttc=0;
foreach($post as $post):
$count++; $ttc=$ttc+$post['Prime']['prime'];
 ?>
<tr>
<td><?php echo $post['Prime']['id'];?></td>
<td><?php echo $post['Prime']['ref'];?></td>
<td><?php echo $this->Html->link($post['Prime']['nom'],array('controller'=>'primes','action'=>'view',$post['Prime']['id'],Inflector::slug($post['Prime']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Prime']['prime']." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $post['Prime']['date'];?></td>
<td><?php echo $this->Html->link($post['Prime']['employe_nom'],array('controller'=>'primes','action'=>'view',$post['Prime']['employe_id'],Inflector::slug($post['Prime']['employe_nom'],$replacement ='_')));?></td>
 
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th> Rate </th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>		<?php echo "<script>window.print();</script>";?>
</div>