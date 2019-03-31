<div class="affichage"> 
<table >
<tr>
<th>ID</th>
<th>Libellé</th>
<th>Type</th>
<th>Current Status</th>
<th>La société</th>
</tr>
<?php 
$count=0; $exp=0; $enc=0; $cg=0; $cm=0; $ca=0; $cl=0;
foreach($post as $post): 
$count++;
if($post['Contrat']['type']=="Garantie")
	$cg++;
if($post['Contrat']['type']=="Maintenance")
	$cm++;
if($post['Contrat']['type']=="Assurance")
	$ca++;
if($post['Contrat']['type']=="Location")
	$cl++;
?>
<tr>
<td><?php echo $post['Contrat']['id'];?></td>
<td><?php echo $this->Html->link($post['Contrat']['nom'],array('controller'=>'Contrats','action'=>'view',$post['Contrat']['id'],Inflector::slug($post['Contrat']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Contrat']['type'];?></td>
<td><?php if(date('Y-m-d')>$post['Contrat']['datef']){ echo "<font color='red'>Contrat expiré</font>"; $exp++; }else{ echo "<font color='green'>Contrat valide</font>"; $enc++; }?></td>
<td><?php echo $this->Html->link($post['Contrat']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Contrat']['client_id'],Inflector::slug($post['Contrat']['client_nom'],$replacement ='_')));?></td>

</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>Expirés</th>
		<th>Valides</th>
		<th>Garantie</th>
		<th>Maintenance</th>
		<th>Assurance</th>
		<th>Location</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $exp;?></td>
		<td><?php echo $enc;?></td>
		<td><?php echo $cg;?></td>
		<td><?php echo $cm;?></td>
		<td><?php echo $ca;?></td>
		<td><?php echo $cl;?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>