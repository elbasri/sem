<div class="affichage"> 
<?php 
$titre=$post['Maintenance']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Maintenance']['nom'];?></strong>
					</td>
					
					<td style="width:35%">L'article: <strong><?php echo $this->Html->link($post['Maintenance']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Maintenance']['materiel_id'],Inflector::slug($post['Maintenance']['materiel_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Date de debut: <strong><?php echo $post['Maintenance']['dated'];?></strong>
					</td>
					
					<td style="width:35%">Date de fin: <strong><?php echo $post['Maintenance']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">État actuel: <strong><?php if(date('Y-m-d')>$post['Maintenance']['datef']) echo "<font color='red'>Maintenance Terminé</font>"; else if(date('Y-m-d')<=$post['Maintenance']['datef'] && date('Y-m-d')>=$post['Maintenance']['dated'])echo "<font color='green'>Maintenance encours</font>"; else if (date('Y-m-d')<$post['Maintenance']['dated'])echo "<font color='blue'>Maintenance planifié</font>";?></strong>
					</td>
					
					<td style="width:35%">
					</td>
				</tr>

			</table>	
<br><h2>Détails de maintenance:</h2> 
<?php echo $post['Maintenance']['infos'];?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>