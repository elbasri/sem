<div class="affichage" > 
<table >
<tr>
<th>ID</th><th>Reference</th>
<th>Due of leave</th>
<th>Type of leave</th>
<th>Current Status</th>
<th>The employee</th>
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
<td><?php if(date('Y-m-d')>$post['Vacance']['datef']){$t++; $ttct=$ttct+$post['Vacance']['cout']; echo "<font color='red'>leave Done</font>";} else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated']){$e++; $ttce=$ttce+$post['Vacance']['cout'];echo "<font color='green'>Current leave</font>";} else if (date('Y-m-d')<$post['Vacance']['dated']){$v++; $ttcv=$ttcv+$post['Vacance']['cout'];echo "<font color='blue'>Upcoming leave</font>";}?></td>
<td><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></td>
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
		<th> Rate </th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Number: ".$t."<br>Rate: ".$ttct." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$e."<br>Rate: ".$ttce." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$v."<br>Rate: ".$ttcv." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>		<?php echo "<script>window.print();</script>";?>
</div>