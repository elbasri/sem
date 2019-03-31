<div class="affichage"> 
<table >
<tr>
<th>ID</th>
<th>Name de la banque</th>
<th>ID de compte</th>
<th>IBAN</th>
<th>Code SWIFT/BIC</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Compte']['id'];?></td>
<td><?php echo $this->Html->link($post['Compte']['nom'],array('controller'=>'comptes','action'=>'view',$post['Compte']['id'],Inflector::slug($post['Compte']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Compte']['numero'];?></td>
<td><?php echo $post['Compte']['iban'];?></td>
<td><?php echo $post['Compte']['swift'];?></td>

</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>