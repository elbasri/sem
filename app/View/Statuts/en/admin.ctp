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
<?php foreach($post as $post): ?>
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
<?php endforeach; unset($post);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Statut']['count']>9){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Previous').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('Next').'</p>';
echo $this->Paginator->counter('Page {:page} of {:pages} Pages');
 }
 ?>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statuts/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Add</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statuts/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Search</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statuts/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort ascendant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statuts/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort descending</font></a>
		</li>
	</ul>
	</div>
</div>
</div>