<div class="affichage"> 
<?php 
$titre=$post['Contrat']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Contrat']['reference'];?></strong>
					</td>
					
					<td style="width:35%">Coût: <strong><?php echo $post['Contrat']['cout'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Contrat']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Type: <strong><?php echo $post['Contrat']['type'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">
					</td>
					
					<td style="width:35%">La société: <strong><?php echo $this->Html->link($post['Contrat']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Contrat']['client_id'],Inflector::slug($post['Contrat']['client_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Start date: <strong><?php echo $post['Contrat']['dated'];?></strong>
					</td>
					
					<td style="width:35%">End date: <strong><?php echo $post['Contrat']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Current Status: <strong><?php if(date('Y-m-d')>$post['Contrat']['datef']) echo "<font color='red'>Contrat expiré</font>"; else echo "<font color='green'>Contrat valide</font>";?></strong>
					</td>
					
					<td style="width:35%"></td>
				</tr>

			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>