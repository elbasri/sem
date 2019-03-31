<div class="affichage" >  
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Libellé</th>
<th>Current Status</th>
<th>The employee</th>
<th>Le Projet</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $v=0;
foreach($post as $post): 
$count++;
?>
<tr>
<td><?php echo $post['Tache']['id'];?></td>
<td><?php echo $post['Tache']['ref'];?></td>
<td><?php echo $this->Html->link($post['Tache']['nom'],array('controller'=>'taches','action'=>'view',$post['Tache']['id'],Inflector::slug($post['Tache']['nom'],$replacement ='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Tache']['datef']){$t++; echo "<font color='red'>Tache Terminé</font>"; }else if(date('Y-m-d')<=$post['Tache']['datef'] && date('Y-m-d')>=$post['Tache']['dated']){$e++; echo "<font color='green'>Tache encours</font>"; }else if (date('Y-m-d')<$post['Tache']['dated']){$v++; echo "<font color='blue'>Tache à venir</font>";}?></td>
<td><?php echo $this->Html->link($post['Tache']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Tache']['employe_id'],Inflector::slug($post['Tache']['employe_nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Tache']['projet_nom'],array('controller'=>'projets','action'=>'view',$post['Tache']['projet_id'],Inflector::slug($post['Tache']['projet_nom'],$replacement ='_')));?></td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th> Completed </th>
		<th> Outstanding </th>
		<th> Upcoming </th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $t;?></td>
		<td><?php echo $e;?></td>
		<td><?php echo $v;?></td>
	</tr>
</table>		<?php echo "<script>window.print();</script>";?>
</div>