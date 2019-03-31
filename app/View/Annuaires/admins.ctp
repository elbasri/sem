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
<?php foreach($post as $post): ?>
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
<?php endforeach; unset($post);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Annuaire']['count']>9){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/annuaires/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/annuaires/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/annuaires/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/annuaires/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
	</ul>
	</div>
</div>
</div>