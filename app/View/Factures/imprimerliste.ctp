<div class="affichage">
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Intitulé</th>
<th>Date</th>
<th>Client</th>
<th>Type</th>
<th>Total HT</th>
<th>Total TTC</th>
<th>Statut</th>
</tr>
<?php 
$count=0; $tauxtva=0; $tauxtva2=0; $tauxremise=0; $tauxfrais=0; $totalht=0; $totalttc=0;
foreach($post as $post): 
$count++; $tauxtva=$tauxtva+(($post['Facture']['tva1']*$post['Facture']['montant'])/100); $tauxtva2=$tauxtva2+(($post['Facture']['tva2']*$post['Facture']['montant'])/100); $tauxremise=$tauxremise+((($post['Facture']['remise']*$post['Facture']['montant'])/100)); $tauxfrais=$tauxfrais+((($post['Facture']['frais']*$post['Facture']['montant'])/100)); $totalht=$totalht+$post['Facture']['montant'];
?>
<tr>
<td><?php echo $post['Facture']['id'];?></td>
<td><?php echo $post['Facture']['reference'];?></td>
<td><?php echo $this->Html->link($post['Facture']['nom'],array('controller'=>'factures','action'=>'view',$post['Facture']['id'],Inflector::slug($post['Facture']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Facture']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Facture']['client_id'],Inflector::slug($post['Facture']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['type']; if($post['Facture']['type']=="Bon de livraison") echo "<br> B.C: ".$this->Html->link($post['Facture']['commande_nom'],array('controller'=>'commandes','action'=>'view',$post['Facture']['commande_id'],Inflector::slug($post['Facture']['commande_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['montant']." ".$post['Facture']['devise'];?></td>
<td><?php 
$tva1=($post['Facture']['tva1']*$post['Facture']['montant'])/100;
$tva2=($post['Facture']['tva2']*$post['Facture']['montant'])/100;
$montant=$post['Facture']['montant']+$tva1+$tva2;
echo $montant." ".$post['Facture']['devise'];
$totalttc=$totalttc+$montant;
?></td>
<td><?php echo $post['Facture']['etat'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
<th>Nombre</th>
<th>TVA</th>
<th>TVA2</th>
<th>HT</th>
<th>TTC</th>
<th>Remises</th>
<th>Frais de dossiers</th>
<th>Taux</th>

<tr>
<td><?php echo $count;?></td>
<td><?php echo $tauxtva." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxtva2." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalht." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxremise." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxfrais." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc-$tauxremise+$tauxfrais." ".$config['Configuration']['Devises'];?></td>
</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>