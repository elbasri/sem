<div class="affichage"> 
<?php 
$titre=$post['Stockaction']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Type: <strong><?php echo $post['Stockaction']['nom'];?></strong>
					</td>
					
					<td style="width:35%">L'article: <strong><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Quantité: <strong><?php echo $post['Stockaction']['qte'];?></strong>
					</td>
					
					<td style="width:35%">Date: <strong><?php echo $post['Stockaction']['date'];?></strong>
					</td>
				</tr>
			</table>	
<br><h2>Raison de l'opération:</h2> 
<?php echo $post['Stockaction']['raison'];?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>