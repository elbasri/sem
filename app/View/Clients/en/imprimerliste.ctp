<div class="affichage"> 
<table>
<tr>
<th>ID</th>
<th>Reference</th>
<th>Société</th>
<th>Contact</th>
<th>Phone</th>
</tr>
<?php 
$count=0;
foreach($users as $user):
$count++;
?>
<tr>
<td><?php echo $user['Client']['id'];?></td>
<td><?php echo $user['Client']['ref'];?></td>
<td><?php echo $this->Html->link($user['Client']['nom'],array('controller'=>'clients','action'=>'view',$user['Client']['id'],Inflector::slug($user['Client']['nom'],$remplacement='_')));?></td>
<td><?php echo $user['Client']['civilite']." ".$user['Client']['prenom'];?></td>
<td><?php echo $user['Client']['tel'];?></td>
</tr>
<?php endforeach; unset($users);?>
</table>
Nombre de dossiers: <?php echo $count; ?>
<div class='pagination'>
<?php
if($this->params['paging']['Client']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Previous').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('Next').'</p>';
echo $this->Paginator->counter('Page {:page} of {:pages} Pages');
 }
 ?>
 </div><?php echo "<script>window.print();</script>";?>
 </div>