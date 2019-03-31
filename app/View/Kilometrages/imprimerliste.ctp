<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date</th>
<th>Type</th>
<th>Véhicule</th>
<th>Distance</th>
<th>Totale (TTC)</th>
</tr>
<?php 
$count=0; $countd=0; $countc=0; $ttc=0; $ttcd=0; $ttcc=0;
foreach($post as $post): 
$count++; $ttc=$ttc+$post['Kilometrage']['taux'];
if($post['Kilometrage']['type']=="professionnelle"){
	$ttcd=$ttcd+$post['Kilometrage']['taux'];
	$countd++;
}
if($post['Kilometrage']['type']=="personnelle"){
	$ttcc=$ttcc+$post['Kilometrage']['taux'];
	$countc++;
}
?>
<tr>
<td><?php echo $post['Kilometrage']['id'];?></td>
<td><?php echo $this->Html->link($post['Kilometrage']['ref'],array('controller'=>'kilometrages','action'=>'view',$post['Kilometrage']['id'],Inflector::slug($post['Kilometrage']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Kilometrage']['date'];?></td>
<td><?php echo $post['Kilometrage']['type'];?></td>
<td><?php echo $this->Html->link($post['Kilometrage']['inventaire_nom'],array('controller'=>'Inventaires','action'=>'view',$post['Kilometrage']['inventaire_id'],Inflector::slug($post['Kilometrage']['inventaire_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Kilometrage']['distance']." ".$config['Configuration']['distance'];?></td>
<td><?php echo $post['Kilometrage']['total']." ".$config['Configuration']['Devises'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Professionnelle</th>
		<th>Personnelle</th>
		<th>Taux</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Nombre: ".$countd."<br>Taux: ".$ttcd." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Nombre: ".$countc."<br>Taux: ".$ttcc." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>