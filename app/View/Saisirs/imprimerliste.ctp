<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date</th>
<th>Type</th>
<th>Compte</th>
<th>Montant (TTC)</th>
</tr>
<?php 
$count=0; $countd=0; $countc=0; $ttc=0; $ttcd=0; $ttcc=0;
foreach($post as $post): 
$count++; $ttc=$ttc+$post['Saisir']['montant'];
if($post['Saisir']['type']=="Débit"){
	$ttcd=$ttcd+$post['Saisir']['montant'];
	$countd++;
}
if($post['Saisir']['type']=="Crédit"){
	$ttcc=$ttcc+$post['Saisir']['montant'];
	$countc++;
}
?>
<tr>
<td><?php echo $post['Saisir']['id'];?></td>
<td><?php echo $this->Html->link($post['Saisir']['ref'],array('controller'=>'saisirs','action'=>'view',$post['Saisir']['id'],Inflector::slug($post['Saisir']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Saisir']['date'];?></td>
<td><?php echo $post['Saisir']['type'];?></td>
<td><?php echo $this->Html->link($post['Saisir']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Saisir']['compte_id'],Inflector::slug($post['Saisir']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Saisir']['montant']." ".$config['Configuration']['Devises'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Débit</th>
		<th>Crédit</th>
		<th>TTC</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Nombre: ".$countd."<br>TTC: ".$ttcd." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Nombre: ".$countc."<br>TTC: ".$ttcc." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>