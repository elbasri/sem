<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Libellé</th>
<th>Espace</th>
<th>Immeuble</th>
<th>Action</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Piece']['id'];?></td>
<td><?php echo $this->Html->link($post['Piece']['nom'],array('controller'=>'pieces','action'=>'view',$post['Piece']['id'],Inflector::slug($post['Piece']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Piece']['espace'];?></td>
<td><?php echo $post['Piece']['immeuble'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'pieces','action'=>'modifier',$post['Piece']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'pieces','action'=>'supprimer',$post['Piece']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>	
</div>