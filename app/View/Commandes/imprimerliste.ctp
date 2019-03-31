<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Intitulé</th>
<th>Date</th>
<th>Emetteur/Récepteur</th>
<th>Total HT</th>
<th>Total TTC</th>
</tr>
<?php 
$count=0; $tauxtva=0; $tauxremise=0; $totalht=0; $totalttc=0;
foreach($post as $post): 
$count++; $tauxtva=$tauxtva+(($post['Commande']['tva1']*$post['Commande']['montant'])/100); $tauxremise=$tauxremise+(($post['Commande']['remise']*$post['Commande']['montant'])/100);$totalht=$totalht+$post['Commande']['montant'];
?>
<tr>
<td><?php echo $post['Commande']['id'];?></td>
<td><?php echo $post['Commande']['reference'];?></td>
<td><?php echo $this->Html->link($post['Commande']['nom'],array('controller'=>'commandes','action'=>'view',$post['Commande']['id'],Inflector::slug($post['Commande']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Commande']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Commande']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Commande']['client_id'],Inflector::slug($post['Commande']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Commande']['montant']." ".$post['Commande']['devise'];?></td>
<td><?php 
echo (($post['Commande']['tva1']*$post['Commande']['montant'])/100)+$post['Commande']['montant'];
echo " ".$post['Commande']['devise'];
$totalttc=$totalttc+((($post['Commande']['tva1']*$post['Commande']['montant'])/100)+$post['Commande']['montant']);
?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
<th>Nombre</th>
<th>TVA</th>
<th>HT</th>
<th>TTC</th>
<th>Remises</th>
<th>Taux</th>

<tr>
<td><?php echo $count;?></td>
<td><?php echo $tauxtva." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalht." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxremise." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc-$tauxremise." ".$config['Configuration']['Devises'];?></td>
</tr>
</table>
		<?php echo "<script>window.print();</script>";?>	
</div>