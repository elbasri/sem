<div class="affichage">
<?php 
$titre=$post['Tache']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Tache']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Libellé: <strong><?php echo $post['Tache']['nom'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">The employee: <strong><?php echo $this->Html->link($post['Tache']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Tache']['employe_id'],Inflector::slug($post['Tache']['employe_nom'],$replacement ='_')));?></strong>
					</td>
					
					<td style="width:35%">Le projet: <strong><?php echo $this->Html->link($post['Tache']['projet_nom'],array('controller'=>'projets','action'=>'view',$post['Tache']['projet_id'],Inflector::slug($post['Tache']['projet_nom'],$replacement ='_')));?></strong>
					</td>
					
				</tr>
				<tr >
					<td>Start date: <strong><?php echo $post['Tache']['dated'];?></strong>
					</td>
					
					<td>End date: <strong><?php echo $post['Tache']['datef'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td>Current Status: <strong><?php if(date('Y-m-d')>$post['Tache']['datef']) echo "<font color='red'>Tache Terminé</font>"; else if(date('Y-m-d')<=$post['Tache']['datef'] && date('Y-m-d')>=$post['Tache']['dated'])echo "<font color='green'>Tache encours</font>"; else if (date('Y-m-d')<$post['Tache']['dated'])echo "<font color='blue'>Tache à venir</font>";?></strong>
					</td>
					
					<td>
					</td>
					
				</tr>
			</table>	
<br><h2>Détails de tache:</h2> 
<?php echo $post['Tache']['infos'];?>

		<?php echo "<script>window.print();</script>";?>						
	</div>	
		
</div>