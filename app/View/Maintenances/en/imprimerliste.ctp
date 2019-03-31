<div class="affichage"> 
<table >
<tr>
<th>ID</th>
<th>Libellé</th>
<th>Current Status</th>
<th>L'article</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $p=0;
foreach($post as $post): $count++; ?>
<tr>
<td><?php echo $post['Maintenance']['id'];?></td>
<td><?php echo $this->Html->link($post['Maintenance']['nom'],array('controller'=>'maintenances','action'=>'view',$post['Maintenance']['id'],Inflector::slug($post['Maintenance']['nom'],$replacement ='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Maintenance']['datef']){$t++; echo "<font color='red'>Maintenance Terminé</font>"; }else if(date('Y-m-d')<=$post['Maintenance']['datef'] && date('Y-m-d')>=$post['Maintenance']['dated']){$e++; echo "<font color='green'>Maintenance encours</font>"; }else if (date('Y-m-d')<$post['Maintenance']['dated']){$p++; echo "<font color='blue'>Maintenance planifié</font>";}?></td>
<td><?php echo $this->Html->link($post['Maintenance']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Maintenance']['materiel_id'],Inflector::slug($post['Maintenance']['materiel_nom'],$replacement ='_')));?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>Treminés</th>
		<th> Outstanding </th>
		<th>Planifiés</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $t;?></td>
		<td><?php echo $e;?></td>
		<td><?php echo $p;?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>