<div class="affichage">
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Libellé</th>
<th>Coût</th>
<th>Current Status</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $v=0; $tt=0; $et=0; $vt=0; $taux=0;
foreach($post as $post): 
$count++; $taux=$taux+$post['Projet']['cout'];
?>
<tr>
<td><?php echo $post['Projet']['id'];?></td>
<td><?php echo $post['Projet']['ref'];?></td>
<td><?php echo $this->Html->link($post['Projet']['nom'],array('controller'=>'projets','action'=>'view',$post['Projet']['id'],Inflector::slug($post['Projet']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Projet']['cout']; echo " ".$config['Configuration']['Devises'];?></td>
<td><?php if(date('Y-m-d')>$post['Projet']['datef']){$t++; $tt=$tt+$post['Projet']['cout']; echo "<font color='red'>Projet Terminé</font>"; }else if(date('Y-m-d')<$post['Projet']['datef'] && date('Y-m-d')>$post['Projet']['dated']){$e++; $et=$et+$post['Projet']['cout']; echo "<font color='green'>Projet encours</font>"; }else if (date('Y-m-d')<$post['Projet']['dated']){$v++; $vt=$vt+$post['Projet']['cout']; echo "<font color='blue'>Projet à venir</font>";} ?></td>
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
		<th>Coût Total</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Number: ".$t."<br>Coût: .".$tt." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$e."<br>Coût: .".$et." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$v."<br>Coût: .".$vt." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $taux." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>