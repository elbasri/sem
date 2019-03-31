<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Societé</th>
<th>Contact</th>
<th>Tél</th>
</tr>
<?php foreach($users as $user):?>
<tr>
<td><?php echo $user['Client']['id'];?></td>
<td><?php echo $user['Client']['ref'];?></td>
<td><?php echo $this->Html->link($user['Client']['nom'],array('controller'=>'clients','action'=>'view',$user['Client']['id'],Inflector::slug($user['Client']['nom'],$remplacement='_')));?></td>
<td><?php echo $user['Client']['civilite']." ".$user['Client']['prenom'];?></td>
<td><?php echo $user['Client']['tel'];?></td>
</tr>
<?php endforeach; unset($users);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Client']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
 </div><?php echo "<script>window.print();</script>";?>
 </div>