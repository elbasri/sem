<div class="affichage">
<?php 
$titre=$post['Stockcategorie']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Stockcategorie']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Type: <strong>
					<?php $type=$post['Stockcategorie']['type']."s";
					echo $this->Html->link($type,array('controller'=>'stockcategories','action'=>$type));?></strong>
					</td>
					
				</tr>

			</table>	
<br><h2>Désignation/plus d'infos:</h2> 
<?php echo $post['Stockcategorie']['infos'];?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>