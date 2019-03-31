<div class="affichage" >  
<table >
<tr>
<th>ID</th>
<th>Libellé</th> 
<th>Type</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Stockcategorie']['id'];?></td>
<td><?php echo $this->Html->link($post['Stockcategorie']['nom'],array('controller'=>'stockcategories','action'=>'view',$post['Stockcategorie']['id'],Inflector::slug($post['Stockcategorie']['nom'],$replacement ='_')));?></td>
<td><?php 
$type=$post['Stockcategorie']['type']."s";
echo $this->Html->link($type,array('controller'=>'stockcategories','action'=>$type));?></td>
<td>
</tr>
<?php endforeach; unset($post);?>
</table>		<?php echo "<script>window.print();</script>";?>
</div>