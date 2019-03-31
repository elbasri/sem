<div class="affichage">
<?php 
$titre=$post['Prime']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Prime']['ref'];?></strong><br>Libellé: <strong><?php echo $post['Prime']['nom'];?></strong>
					</td>
					<td style="width:35%">Taux: <strong><?php echo $post['Prime']['prime']." ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Date de prime: <strong><?php echo $post['Prime']['date'];?></strong>
					</td>
					<td style="width:35%">
					</td>
				</tr>
				<tr >
					<td style="width:35%">L'employe (bénéficier): <strong><?php echo $this->Html->link($post['Prime']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Prime']['employe_id'],Inflector::slug($post['Prime']['employe_nom'],$replacement ='_')));?></strong>
					</td>
					<td style="width:35%"> 
					</td>
				</tr>
				<tr >
					<td style="width:35%">Numéro d'employe: <strong><?php echo $post['Prime']['employe_id'];?></strong>
					</td>
					<td style="width:35%">
					</td>
				</tr>
			</table> 

<?php echo "<script>window.print();</script>";?>						
	</div>	
		
</div>