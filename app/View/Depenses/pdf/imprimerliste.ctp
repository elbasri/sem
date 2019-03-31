<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date de paiement</th>
<th>Categorie</th>
<th>Compte</th>
<th>Total (TTC)</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Depense']['id'];?></td>
<td><?php echo $this->Html->link($post['Depense']['ref'],array('controller'=>'depenses','action'=>'view',$post['Depense']['id'],Inflector::slug($post['Depense']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Depense']['date'];?></td>
<td><?php echo $this->Html->link($post['Depense']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Depense']['categorie_id'],Inflector::slug($post['Depense']['categorie_nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Depense']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Depense']['compte_id'],Inflector::slug($post['Depense']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Depense']['payee'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php echo "<script>window.print();</script>";?>
</div>