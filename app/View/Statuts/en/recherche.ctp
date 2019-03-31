<?php  if($test==0){?>
<div class="affichage">  
		<?php echo $this->Form->create('Statut',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><?php echo $this->Form->input('ref',array('label'=>'Reference')); ?></td>
		<td><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>

<div class="affichage"> 
<table>
<tr>
<th>ID</th>
<th>Reference</th>
<th>Titre</th>
<th>End date</th>
<th>Date de création</th>
<th>Status</th>
<th>Type</th>
<th>Action</th>
</tr>
<?php $count=0; foreach($realisation as $post): 
					?>
<tr>
<td><?php echo $post['Statut']['id'];?></td>
<td><?php echo $this->Html->link($post['Statut']['ref'],array('controller'=>'statuts','action'=>'view',$post['Statut']['id'],Inflector::slug($post['Statut']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Statut']['nom'];?></td>
<td><?php echo $post['Statut']['date'];?></td>
<td><?php echo $post['Statut']['created'];?></td>
<td><?php if($post['Statut']['etat']=='0') echo "Traité"; else echo "Encours";?></td>
<td><?php if($post['Statut']['type']=='0') echo "optionnel"; else echo "obligatoire";?></td>
<td>
<?php 
echo $this->HTML->link('Edit',array('controller'=>'statuts','action'=>'Edit',$post['Statut']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'statuts','action'=>'Delete',$post['Statut']['id']));
?>
</td>
</tr>
			<?php $count++; endforeach;?>
			<?php unset($post);?>
</table>
	<h2><?php if($count==0) echo "No Result!";?></h2>
	<h2><a href="recherche" >New Search</a></h2>
</div>
<?php }?>