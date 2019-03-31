<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>L'opération</th>
<th>Logiciel</th>
<th>Utilisateur</th>
<th>Date</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Evennement']['id'];?></td>
<td><?php echo $post['Evennement']['titre'];?></td>
<td><?php echo $post['Evennement']['logiciel'];?></td>
<td><?php echo $this->Html->link($post['Evennement']['user'],array('controller'=>'users','action'=>'view',$post['Evennement']['iduser'],Inflector::slug($post['Evennement']['user'],$replacement ='_')));?></td>
<td><?php echo $post['Evennement']['created'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Evennement']['count']>49){
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
		<a href="<?=$this->Html->url('/evennements/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/evennements/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
	</ul>
	</div>
</div>
</div>