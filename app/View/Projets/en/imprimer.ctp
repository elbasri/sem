<div class="affichage">
<?php 
$titre=$post['Projet']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:35%">Libellé: <strong><?php echo $post['Projet']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Reference: <strong><?php echo $post['Projet']['ref'];?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Coût de Projet: <strong><?php echo $post['Projet']['cout']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
					
					<td style="width:35%"> <strong></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Start date: <strong><?php echo $post['Projet']['dated'];?></strong>
					</td>
					<td style="width:35%">End date: <strong><?php echo $post['Projet']['datef']; ?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Current Status: <strong><?php if(date('Y-m-d')>$post['Projet']['datef']) echo "<font color='red'>Projet Terminé</font>"; else if(date('Y-m-d')<$post['Projet']['datef'] && date('Y-m-d')>$post['Projet']['dated'])echo "<font color='green'>Projet encours</font>"; else if (date('Y-m-d')<$post['Projet']['dated'])echo "<font color='blue'>Projet à venir</font>";?></strong>
					</td>
					<td style="width:35%"></td>
				</tr>
			</table>	
<br><h2>Description de Projet:</h2> 
<?php echo $post['Projet']['description'];?>

<?php echo "<script>window.print();</script>";?>							
	</div>	
		
</div>