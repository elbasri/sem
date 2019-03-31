<div class="affichage" > 
<table >
<tr>
<th>Numéro</th><th>Référence</th>
<th>Raison de congés</th>
<th>Type de congés</th>
<th>État actuel</th>
<th>L'employe</th>
<th>Action</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $v=0; $ttc=0; $ttct=0; $ttce=0; $ttcv=0;
foreach($post as $post):
$count++; $ttc=$ttc+$post['Vacance']['cout'];
 ?>
<tr>
<td><?php echo $post['Vacance']['id'];?></td>
<td><?php echo $post['Vacance']['ref'];?></td>
<td><?php echo $this->Html->link($post['Vacance']['nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['id'],Inflector::slug($post['Vacance']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Vacance']['type'];?></td>
<td><?php if(date('Y-m-d')>$post['Vacance']['datef']){$t++; $ttct=$ttct+$post['Vacance']['cout']; echo "<font color='red'>Congés Terminé</font>";} else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated']){$e++; $ttce=$ttce+$post['Vacance']['cout'];echo "<font color='green'>Congés encours</font>";} else if (date('Y-m-d')<$post['Vacance']['dated']){$v++; $ttcv=$ttcv+$post['Vacance']['cout'];echo "<font color='blue'>Congés à venir</font>";}?></td>
<td><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Terminés</th>
		<th>Encours</th>
		<th>A venir</th>
		<th>Taux</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Nombre: ".$t."<br>Taux: ".$ttct." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Nombre: ".$e."<br>Taux: ".$ttce." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Nombre: ".$v."<br>Taux: ".$ttcv." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>		<?php echo "<script>window.print();</script>";?>
</div>