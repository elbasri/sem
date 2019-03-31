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
				<tr>
					<td style="width:35%">Date: <strong><?php echo $post['Stockaction']['date'];?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Quantité: <strong><?php echo $post['Stockaction']['qte']." ";
						if($post['Stockaction']['type']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($post['Stockaction']['type']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?></strong>
					</td>
					<td style="width:35%">Taux: <strong><?php echo $post['Stockaction']['cout']." ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<?php if($post['Stockaction']['nom']=='sortie'){?>
				<tr >
					<td style="width:35%">Destination: <strong><?php 
						if($post['Stockaction']['type']==1) echo $this->Html->link($post['Stockaction']['article_nom'],array('controller'=>'inventaires','action'=>'view',$post['Stockaction']['article_id'],Inflector::slug($post['Stockaction']['article_nom'],$replacement ='_')));
						else if($post['Stockaction']['type']==2) echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));
						else
							echo "Indéfinie";

						?></strong>
					</td>
					
					<td style="width:35%">Plus d'Infos: <strong><?php if($post['Stockaction']['valeurtxt']!="")echo $post['Stockaction']['valeurtxt'].": ".$post['Stockaction']['valeur']; else echo "aucun";?></strong>
					</td>
				</tr>
				<?php }?>
			</table>			
<br><h2>Raison de l'opération:</h2> 
<?php if($post['Stockaction']['raison']!="")echo $post['Stockaction']['raison']; else echo "Indéfinie";?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>