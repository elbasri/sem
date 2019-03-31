<div class="affichage">
<?php 
$titre=$post['Realisation']['titre'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Realisation']['titre'];?></strong>
					</td>
					<td style="width:35%">Coût de réalisation: <strong><?php echo $post['Realisation']['cout']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Le Projet: <strong><?php echo $this->Html->link($post['Realisation']['projet_nom'],array('controller'=>'projets','action'=>'view',$post['Realisation']['projet_id'],Inflector::slug($post['Realisation']['projet_nom'],$replacement ='_')));?></strong>
					</td>
					<td style="width:35%">
					</td>
				</tr>
				<tr >
					<td style="width:35%">Start date: <strong><?php echo $post['Realisation']['apartir'];?></strong>
					</td>
					<td style="width:35%">End date: <strong><?php echo $post['Realisation']['jusqua'];?></strong>
					</td>
				</tr>

			</table>	
<br><h2>Description de réalisation:</h2> 
<?php echo $post['Realisation']['description'];?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>