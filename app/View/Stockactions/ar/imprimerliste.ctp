<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>Type</th>
<th>Quantité</th>
<th>Date</th>
<th>L'article</th>
<?php if($this->Session->read('typeoperation')=='sortie'){?>
<th>Destination</th>
<th>Plus d'Infos</th>
<?php }?>
</tr>
<?php 
$count=0; $sortie=0; $entree=0; $tauxe=0; $tauxs=0; $taux=0; $qtee=0; $qtes=0; $qte=0;
foreach($post as $post): 
$count++; $taux=$taux+$post['Stockaction']['cout']; $qte=$qte+$post['Stockaction']['qte'];
?>
<tr>
<td><?php echo $post['Stockaction']['id'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['nom'],array('controller'=>'stockactions','action'=>'view',$post['Stockaction']['id'],Inflector::slug($post['Stockaction']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Stockaction']['qte']." ";
	if($post['Stockaction']['type']=="2")
		echo "<strong>".$config['Configuration']['volume']."</strong>";
	else if($post['Stockaction']['type']=="3")
		echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>
<td><?php echo $post['Stockaction']['date'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<?php if($this->Session->read('typeoperation')=='sortie'){
?>
<td><?php 
if($post['Stockaction']['type']==1) echo $this->Html->link($post['Stockaction']['article_nom'],array('controller'=>'inventaires','action'=>'view',$post['Stockaction']['article_id'],Inflector::slug($post['Stockaction']['article_nom'],$replacement ='_')));
else if($post['Stockaction']['type']==2) echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));
else
	echo "Indéfinie";

?></td>
<td><?php if($post['Stockaction']['valeur']!=0){echo $post['Stockaction']['valeurtxt'].": ".$post['Stockaction']['valeur'];} else echo "aucun";?></td>
<?php } 
if($post['Stockaction']['nom']=="sortie"){ $sortie++;  $tauxs=$tauxs+$post['Stockaction']['cout']; $qtes=$qtes+$post['Stockaction']['qte']; }
else { $entree++; $tauxe=$tauxe+$post['Stockaction']['cout']; $qtee=$qtee+$post['Stockaction']['qte'];}?>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Entrées</th>
		<th>Sorties</th>
		<th>Quantité</th>
		<th>Taux</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Nombre: ".$entree; echo "<br>Quantité: ".$qtee; echo "<br>Taux: ".$tauxe;?></td>
		<td><?php echo "Nombre: ".$sortie; echo "<br>Quantité: ".$qtes; echo "<br>Taux: ".$tauxs;?></td>
		<td><?php echo $qte;?></td>
		<td><?php echo $taux;?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>