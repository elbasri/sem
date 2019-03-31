<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>Nom</th>
<th>Prénom</th>
<th>Tél</th>
<th>Spécialité</th>
<th>Date de début du contrat</th>
<th>Date de fin du contrat</th>
<th>Date d'expiration CIN</th>
</tr>
<?php foreach($users as $user):?>
<tr>
<td><?php echo $user['Employe']['id'];?></td>
<td><?php echo $this->Html->link($user['Employe']['nom'],array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$remplacement='_')));?></td>
<td><?php echo $user['Employe']['prenom'];?></td>
<td><?php echo $user['Employe']['tel'];?></td>
<td><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></td>
<td><?php echo $user['Employe']['datetravail'];?></td>
<td><?php echo $user['Employe']['datefintravail']; if(date('Y-m-d')>$user['Employe']['datefintravail']) echo "<br><font color='red'>Contrat expiré</font>";?></td>
<td><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']) echo "<br><font color='red'>CIN expiré</font>";?></td>
</tr>
<?php endforeach; unset($users);?>
</table>		<?php echo "<script>window.print();</script>";?>
 </div>
 
 