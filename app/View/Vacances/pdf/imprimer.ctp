<div class="affichage">
<?php 
$titre=$post['Vacance']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Vacance']['ref'];?></strong><br>Raison de congés: <strong><?php echo $post['Vacance']['nom'];?></strong>
					</td>
					<td style="width:35%">Type de congés: <strong><?php echo $post['Vacance']['type'];?></strong>
					</td>
				</tr>
				
				<tr >
					<td style="width:35%">Date de debut: <strong><?php echo $post['Vacance']['dated'];?></strong>
					</td>
					<td style="width:35%">Date de fin: <strong><?php echo $post['Vacance']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">L'employe (bénéficier): <strong><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></strong><br>
					Numéro d'employe: <strong><?php echo $post['Vacance']['employe_id'];?></strong>
					</td>
					<td style="width:35%"> <strong></strong>
					</td>
				</tr>
				<tr >
					<td>État actuel: <strong><?php if(date('Y-m-d')>$post['Vacance']['datef']) echo "<font color='red'>Congés Terminé</font>"; else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated'])echo "<font color='green'>Congés encours</font>"; else if (date('Y-m-d')<$post['Vacance']['dated'])echo "<font color='blue'>Congés à venir</font>";?></strong>
					</td>
					
					<td>
					</td>
					
				</tr>

			</table>
			
<?php echo "<script>window.print();</script>";?>			
	</div>	
		
</div>