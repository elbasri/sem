<div class="affichage"> 
<?php 
$titre=$post['Saisir']['ref'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Saisir']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Date: <strong><?php echo $post['Saisir']['date'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Type: <strong><?php echo $post['Saisir']['type'];?></strong>
					</td>
					
					<td style="width:35%">Compte: <strong><?php echo $this->Html->link($post['Saisir']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Saisir']['compte_id'],Inflector::slug($post['Saisir']['compte_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Montant (TTC): <strong><?php echo $post['Saisir']['montant'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">Description: <strong><?php echo $post['Saisir']['description'];?></strong>
					</td>
				</tr>

			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>