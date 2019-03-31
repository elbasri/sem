<div class="affichage"> 
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Intitulé</th>
<th>Date</th>
<th>Client</th>
<th>Type</th>
<th>Total HT</th>
<th>Total TTC</th>
<th>Status</th>
</tr>
<?php 
$count=0; $tauxtva=0; $tauxtva2=0; $tauxremise=0; $totalht=0; $totalttc=0;
foreach($post as $post): 
$count++; $tauxtva=$tauxtva+(($post['Devise']['tva1']*$post['Devise']['montant'])/100); $tauxtva2=$tauxtva2+(($post['Devise']['tva2']*$post['Devise']['montant'])/100); $tauxremise=$tauxremise+(($post['Devise']['remise']*$post['Devise']['montant'])/100); $totalht=$totalht+$post['Devise']['montant'];
?>
<tr>
<td><?php echo $post['Devise']['id'];?></td>
<td><?php echo $post['Devise']['reference'];?></td>
<td><?php echo $this->Html->link($post['Devise']['nom'],array('controller'=>'devises','action'=>'view',$post['Devise']['id'],Inflector::slug($post['Devise']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Devise']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Devise']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Devise']['client_id'],Inflector::slug($post['Devise']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Devise']['type'];?></td>
<td><?php echo $post['Devise']['montant']." ".$post['Devise']['devise'];?></td>
<td><?php
$tva1=($post['Devise']['tva1']*$post['Devise']['montant'])/100;
$tva2=($post['Devise']['tva2']*$post['Devise']['montant'])/100;
$montant=$post['Devise']['montant']+$tva1+$tva2;
 echo $montant." ".$post['Devise']['devise'];
$totalttc=$totalttc+$montant;
 ?></td>
<td><?php echo $post['Devise']['etat'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
<th>Number</th>
<th>TVA</th>
<th>TVA2</th>
<th>HT</th>
<th>TTC</th>
<th>Remises</th>
<th> Rate </th>

<tr>
<td><?php echo $count;?></td>
<td><?php echo $tauxtva." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxtva2." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalht." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxremise." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc-$tauxremise." ".$config['Configuration']['Devises'];?></td>
</tr>
</table>
		<?php echo "<script>window.print();</script>";?>	
</div>