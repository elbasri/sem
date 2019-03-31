<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>Type</th>
<th>Quantité</th>
<th>Date</th>
<th>L'article</th>
<?php if($this->Session->read('typeoperation')=='sortie'){?>
<th>Destination</th>
<th>Plus d'Infos</th>
<?php }?>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Stockaction']['id'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['nom'],array('controller'=>'stockactions','action'=>'view',$post['Stockaction']['id'],Inflector::slug($post['Stockaction']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Stockaction']['qte'];?></td>
<td><?php echo $post['Stockaction']['date'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<?php if($this->Session->read('typeoperation')=='sortie'){?>
<td><?php 
if($post['Stockaction']['type']==1) echo $this->Html->link($post['Stockaction']['article_nom'],array('controller'=>'inventaires','action'=>'view',$post['Stockaction']['article_id'],Inflector::slug($post['Stockaction']['article_nom'],$replacement ='_')));
else if($post['Stockaction']['type']==2) echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));
else
	echo "Indéfinie";

?></td>
<td><?php if($post['Stockaction']['valeurtxt']!="")echo $post['Stockaction']['valeurtxt'].": ".$post['Stockaction']['valeur']; else echo "aucun";?></td>
<?php }?>
</tr>
<?php endforeach; unset($post);?>
</table><?php echo "<script>window.print();</script>";?>
</div>