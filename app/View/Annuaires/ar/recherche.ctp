<?php  if($test==0){?>
<div class="affichage">  
		<?php echo $this->Form->create('Annuaire',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><?php echo $this->Form->input('ref',array('label'=>'L\'entreprise')); ?></td>
		<td><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>

<div class="affichage"> 
<table>
<tr>
<th>L'entreprise</th>
<th>Secteur</th>
<th>Description</th>
<th>Site web</th>
<th>Page de contact</th>
<th>Statut</th>
<th>Action</th>
</tr>
<?php $count=0; foreach($realisation as $post): 
					?>
<tr>
<td><?php echo $post['Annuaire']['nom'];?></td>
<td><?php echo $post['Annuaire']['secteur'];?></td>
<td><?php echo $post['Annuaire']['desc'];?></td>
<td><a href="<?php echo $post['Annuaire']['site'];?>">Visitez son site</a></td>
<td><a href="<?php echo $post['Annuaire']['demande'];?>">Envoyez un demande</a></td>
<td><?php if($post['Annuaire']['etat']=='0') echo "Caché"; else echo "Affiché";?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'annuaires','action'=>'modifier',$post['Annuaire']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'annuaires','action'=>'supprimer',$post['Annuaire']['id']));
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