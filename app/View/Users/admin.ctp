<div class="affichage">
<table>
<tr>
<th>Numéro</th>
<th>Pseudo</th>
<th>Nom</th>
<th>Email</th>
<th>Type</th>
<th>Statut</th> 
<th>Action</th>
</tr>
<?php foreach($users as $user):?>
<tr>
<td><?php echo $user['User']['id'];?></td>
<td><?php echo $this->Html->link($user['User']['username'],array('controller'=>'users','action'=>'view',$user['User']['id'],Inflector::slug($user['User']['username'],$remplacement='_')));?></td>
<td><?php echo $user['User']['nom'];?></td>
<td><?php echo $user['User']['email'];?></td>
<td><?php 
if($user['User']['id']==1)
	echo '<font color=\'red\'>Super Admin</font>';
else if($user['User']['role']=='admin')
	echo '<font color=\'red\'>'.$user['User']['role'].'</font>';
else if($user['User']['role']=='moderateur')
	echo '<font color=\'#0000FF\'>'.$user['User']['role'].'</font>';
else
	echo '<font color=\'green\'>'.$user['User']['role'].'</font>';
?></td>
<td><?php 
if($user['User']['etat']==0)
	echo '<p style=\'color:red\'>Innactif</p>';
else
	echo '<p style=\'color:green\'>Actif</p>';
?></td>
 
<td>

<?php 
echo $this->Html->link('Modifier',array('controller'=>'users','action'=>'edit',$user['User']['id'])).'&nbsp;&nbsp; ';
echo $this->Form->postLink('Supprimer',array('controller'=>'users','action'=>'delete',$user['User']['id']));
?>
</td>
</tr>
<?php endforeach; unset($users);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['User']['count']>5){
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
		<a href="<?=$this->Html->url('/users/actives')?>" class="mega-link btn widthcent2"><font class="widthcent3">Actives</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/inactives')?>" class="mega-link btn widthcent2"><font class="widthcent3">Inactives</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
	</ul>
	</div>
</div>
 </div>
