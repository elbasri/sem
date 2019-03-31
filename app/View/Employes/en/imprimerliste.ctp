<div class="affichage"> 
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Prénom</th>
<th>Spécialité</th>
<th>Start date du contrat</th>
<th>End date du contrat</th>
<th>Date d'expiration CIN</th>
</tr>
<?php 
$count=0; $cin=0; $ctr=0; $ttc=0;
foreach($users as $user):
$count++; $ttc=$ttc+$user['Employe']['salaire'];
?>
<tr>
<td><?php echo $user['Employe']['id'];?></td>
<td><?php echo $this->Html->link($user['Employe']['nom'],array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$remplacement='_')));?></td>
<td><?php echo $user['Employe']['prenom'];?></td>
<td><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></td>
<td><?php echo $user['Employe']['datetravail'];?></td>
<td><?php echo $user['Employe']['datefintravail']; if(date('Y-m-d')>$user['Employe']['datefintravail']){ echo "<br><font color='red'>Contrat expiré</font>"; $ctr++;}?></td>
<td><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']){ echo "<br><font color='red'>CIN expiré</font>"; $cin++;}?></td>
</tr>
<?php endforeach; unset($users);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>CIN expirés</th>
		<th>Contrats expirés</th>
		<th>Taux de salaires</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $cin;?></td>
		<td><?php echo $ctr;?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>		<?php echo "<script>window.print();</script>";?>
 </div>
 
 