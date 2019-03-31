<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Libellé</th>
<th>Coût</th>
<th>A partir</th>
<th>Jusqu'à</th>
<th>Le Projet</th>
<th>Action</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Realisation']['id'];?></td>
<td><?php echo $this->Html->link($post['Realisation']['titre'],array('controller'=>'realisations','action'=>'view',$post['Realisation']['id'],Inflector::slug($post['Realisation']['titre'],$replacement ='_')));?></td>
<td><?php echo $post['Realisation']['cout']; echo " ".$config['Configuration']['Devises'];?></td>
<td><?php echo $post['Realisation']['apartir'];?></td>
<td><?php echo $post['Realisation']['jusqua'];?></td>
<td><?php echo $this->Html->link($post['Realisation']['projet_nom'],array('controller'=>'projets','action'=>'view',$post['Realisation']['projet_id'],Inflector::slug($post['Realisation']['projet_nom'],$replacement ='_')));?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'Realisations','action'=>'modifier',$post['Realisation']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'realisations','action'=>'supprimer',$post['Realisation']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>