<div class="affichage" >  
<table >
<tr>
<th>Libellé</th> 
<th style="text-align:center">Qte</th>
<th style="text-align:center">N.INV</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $this->Html->link($post['Stockcategorie']['nom'],array('controller'=>'stockcategories','action'=>'view',$post['Stockcategorie']['id'],Inflector::slug($post['Stockcategorie']['nom'],$replacement ='_')));?></td>
<td></td>
<td></td>

</tr>
<?php endforeach; unset($post);?>
</table>		<?php echo "<script>window.print();</script>";?>
</div>
