<div class="affichage" >  
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date</th>
<th>Net à payer</th>
<th>L'employe</th>
</tr>
<?php 
$count=0; $r=0; $net=0; $p=0; $ttc=0;
foreach($post as $post):
$count++; $r=$r+($post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations']); $net=$net+($post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations']-$post['Paie']['salariales']-$post['Paie']['autre']); $p=$p+$post['Paie']['patronales']; $ttc=$ttc+($post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations']+$post['Paie']['patronales']);
 ?>
<tr>
<td><?php echo $post['Paie']['id'];?></td>
<td><?php echo $this->Html->link($post['Paie']['ref'],array('controller'=>'paies','action'=>'view',$post['Paie']['id'],Inflector::slug($post['Paie']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Paie']['date'];?></td>
<td><?php 
echo $post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations']-$post['Paie']['salariales']-$post['Paie']['autre']; 
echo " ".$config['Configuration']['Devises'];?></td>
<td><?php echo $this->Html->link($post['Paie']['employe_nom'],array('controller'=>'paies','action'=>'view',$post['Paie']['employe_id'],Inflector::slug($post['Paie']['employe_nom'],$replacement ='_')));?></td>
<td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Rémunération brute</th>
		<th>Net à payer</th>
		<th>Cotisations patronales</th>
		<th>Coût total employeur </th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $r." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $net." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $p." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>		<?php echo "<script>window.print();</script>";?>
</div>