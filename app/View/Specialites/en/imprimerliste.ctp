<div class="affichage" >  
<table >
<tr>
<th>ID</th>
<th>Libellé</th> 
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Specialite']['id'];?></td>
<td><?php echo $this->Html->link($post['Specialite']['nom'],array('controller'=>'Specialites','action'=>'view',$post['Specialite']['id'],Inflector::slug($post['Specialite']['nom'],$replacement ='_')));?></td>
 
</tr>
<?php endforeach; unset($post);?>
</table>		<?php echo "<script>window.print();</script>";?>
</div>