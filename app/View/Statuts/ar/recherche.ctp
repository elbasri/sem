<?php  if($test==0){?>
<div class="affichage">  
		<?php echo $this->Form->create('Statut',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><?php echo $this->Form->input('ref',array('label'=>'Référence')); ?></td>
		<td><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>

<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Titre</th>
<th>Date de fin</th>
<th>Date de création</th>
<th>Statut</th>
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
echo $this->HTML->link('Modifier',array('controller'=>'statuts','action'=>'modifier',$post['Statut']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'statuts','action'=>'supprimer',$post['Statut']['id']));
?>
</td>
</tr>
			<?php $count++; endforeach;?>
			<?php unset($post);?>
</table>
	<h2><?php if($count==0) echo "Aucun Resultat !";?></h2>
	<h2><a href="recherche" >Nouvelle Recherche</a></h2>
</div>
<?php }?>