<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Intitulé</th>
<th>Date</th>
<th>Client</th>
<th>Type</th>
<th>Montant</th>
<th>Statut</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td><?php echo $post['Facture']['id'];?></td>
<td><?php echo $post['Facture']['reference'];?></td>
<td><?php echo $this->Html->link($post['Facture']['nom'],array('controller'=>'factures','action'=>'view',$post['Facture']['id'],Inflector::slug($post['Facture']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Facture']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Facture']['client_id'],Inflector::slug($post['Facture']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['type']; if($post['Facture']['type']=="Bon de livraison") echo "<br> B.C: ".$this->Html->link($post['Facture']['commande_nom'],array('controller'=>'commandes','action'=>'view',$post['Facture']['commande_id'],Inflector::slug($post['Facture']['commande_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['montant']." ".$post['Facture']['devise'];?></td>
<td><?php echo $post['Facture']['etat'];?></td>

</tr>
<?php endforeach; unset($post);?>
</table>
</div>