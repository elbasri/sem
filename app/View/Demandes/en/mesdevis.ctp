<div class="affichage">
<h1>Liste de Demandes </h1>
<table >
<tr>
<th>ID</th>
<th>Titre de demande</th>
<th>Date</th>
<th>Etat</th> 
</tr>
<?php foreach($demande as $post): ?>
<tr><td><?php echo $post['Demande']['id'];?></td>
<td><?php echo $post['Demande']['titre'];?></td> 
<td><?php echo $post['Demande']['created'];?></td> 
<td>
<?php 
if($post['Demande']['etat']!=0)
	echo "<font color='green'>Votre demande a été traité</font>";
else
	echo "<font color='red'>En cours de traitement</font>";
?>
</td> 
<tr>
<?php endforeach; unset($post);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Demande']['count']>5){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Previous').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('Next').'</p>';
echo $this->Paginator->counter('Page {:page} of {:pages} Pages');
 }
 ?>
 </div>
</div>