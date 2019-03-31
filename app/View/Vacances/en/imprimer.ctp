<div class="affichage">
<?php 
$titre=$post['Vacance']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Vacance']['ref'];?></strong>
					</td>
					<td style="width:35%">Due of leave: <strong><?php echo $post['Vacance']['nom'];?></strong>
					</td>
				</tr>
			
				<tr >
					<td style="width:35%">Type of leave: <strong><?php echo $post['Vacance']['type'];?></strong>
					</td>
					<td style="width:35%"><?php if($post['Vacance']['cout']!=0){ ?>Taux: <strong><?php echo $post['Vacance']['cout']." ".$config['Configuration']['Devises'];?></strong><?php }?>
					</td>
				</tr>
			
				<tr >
					<td style="width:35%">Start date: <strong><?php echo $post['Vacance']['dated'];?></strong>
					</td>
					<td style="width:35%">End date: <strong><?php echo $post['Vacance']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">The employee (benefit): <strong><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></strong><br>
					Number of employees: <strong><?php echo $post['Vacance']['employe_id'];?></strong>
					</td>
					<td style="width:35%"> <strong></strong>
					</td>
				</tr>
				<tr >
					<td>Current Status: <strong><?php if(date('Y-m-d')>$post['Vacance']['datef']) echo "<font color='red'>leave Done</font>"; else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated'])echo "<font color='green'>Current leave</font>"; else if (date('Y-m-d')<$post['Vacance']['dated'])echo "<font color='blue'>Upcoming leave</font>";?></strong>
					</td>
					
					<td>
					</td>
					
				</tr>

			</table>
			
<?php echo "<script>window.print();</script>";?>			
	</div>	
		
</div>