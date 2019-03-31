<div class="affichage"> 
<?php 
$titre=$post['Stockaction']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

		<div class="infosdemande">
			<table >
				<tr>
					<td style="width:70%">
					<table>
						<?php if($post['Stockaction']['nom']=="sortie"){ ?>
						<tr><td>Destination: <strong><?php echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));?></strong></td></tr>
						<tr><td>Demandeur: <strong></strong></td></tr>
						<?php } ?>
					</table>
					</td>
					
					<td style="width:30%">
					<table>
						<tr><td>Référence </td><td><?php echo $post['Stockaction']['id'];?></td></tr>
						<tr><td>Date </td><td><?php echo $post['Stockaction']['date'];?></td></tr>
					</table>
					</td>
					
				</tr>
			</table>
<br>

<div align="center" class="affichago">
<table >
<tr>
<th style="width:10%">N. INV</th>
<th style="width:70%">Désignation</th>
<th style="width:15%">Quantité</th>
</tr>
<tr>
<td style="height:40px"><?php if($post['Stockaction']['ref']!=null) echo $post['Stockaction']['ref']; else echo "____"?></td>
<td style="height:40px; text-align:left"><?php
$post['Stockaction']['materiel_nom']=strpos($post['Stockaction']['materiel_nom'], " - ") ? substr($post['Stockaction']['materiel_nom'], 0, strpos($post['Stockaction']['materiel_nom'], " - ")) : $post['Stockaction']['materiel_nom'];
echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Stockaction']['qte']." ";
						if($post['Stockaction']['typevaleur']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($post['Stockaction']['typevaleur']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>
</tr>

</table>
</div>
 	
	</div>	
		
</div>
