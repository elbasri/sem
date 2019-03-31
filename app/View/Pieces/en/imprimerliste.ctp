<div class="affichage">
<table >
<tr>
<th>ID</th>
<th>Libellé</th>
<th>Espace</th>
<th>Immeuble</th>
<th>Action</th>
</tr>
<?php 
$count=0; $espace=0;
foreach($post as $post): 
$count++; $espace=$espace+$post['Piece']['espace'];
?>
<tr>
<td><?php echo $post['Piece']['id'];?></td>
<td><?php echo $this->Html->link($post['Piece']['nom'],array('controller'=>'pieces','action'=>'view',$post['Piece']['id'],Inflector::slug($post['Piece']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Piece']['espace'];?></td>
<td><?php echo $post['Piece']['immeuble'];?></td>
<td>
<?php 
echo $this->HTML->link('Edit',array('controller'=>'pieces','action'=>'Edit',$post['Piece']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'pieces','action'=>'Delete',$post['Piece']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>Somme d'espaces</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $espace;?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>	
</div>