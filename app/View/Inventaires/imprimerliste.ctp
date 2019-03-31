<div class="affichage">
<table >
<tr>
<th>Emplacement</th>
<th width="200">Désignation/Article</th>
<th> N.INV &nbsp;</th>
<th>QTE</th>
<th>Observation</th>
</tr>
<?php 
 foreach($post as $post): 
 ?>
<tr>
<td><?php echo $this->Html->link($post['Inventaire']['piece_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['piece_id'],Inflector::slug($post['Inventaire']['piece_nom'],$remplacement='_')));?></td>
<td><?php echo $this->Html->link($post['Inventaire']['nom'],array('controller'=>'inventaires','action'=>'view',$post['Inventaire']['id'],Inflector::slug($post['Inventaire']['nom'],$replacement ='_')));?></td>
<td ><?php echo $post['Inventaire']['ref'];?></td>
<td><?php echo $post['Inventaire']['qte'];?></td>
<td><?php echo $post['Inventaire']['infos'];?></td>
<!--<td><?php echo $post['Inventaire']['etat'];?></td>
<td style="height:80px"></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>-->

</tr>
<?php endforeach; unset($post);?>
</table>


<?php //echo "<script>window.print();</script>";?>	
</div>
