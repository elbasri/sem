<div class="affichage">
<?php 
$titre=$post['Facture']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
			<table >
				<tr>
					<td style="width:70%">
					<table>
						<tr><td>Destination: <strong><?php echo $this->Html->link($post['Facture']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Facture']['client_id'],Inflector::slug($post['Facture']['client_nom'],$replacement ='_')));?></strong></td></tr>
						<tr><td>Demandeur: <strong></strong></td></tr>
					</table>
					</td>
					
					<td style="width:30%">
					<table>
						<tr><td>Référence </td><td><?php echo $post['Facture']['id'];?></td></tr>
						<tr><td>Date </td><td><?php echo $post['Facture']['created'];?></td></tr>
					</table>
					</td>
					
				</tr>
			</table>
<br>
<?php if($post['Facture']['infos']!="") echo $post['Facture']['infos'];?>
<br>
<div align="center" class="affichago">
<?php /*if($post['Commande']['type']=="A envoyer"){?><p ><strong style="font-size:30px">Demande De Prix</strong><br>Demande de réduction d'environ <?php echo $post['Commande']['remise'];?>%</p><?php } else{ ?><p style="font-size:30px"><strong>Arrivage des commandes</strong></p><?php } */?>
<?php  $count=0; if(isset($items) && $items){?>
<table>
<tr>
<th style="width:10%">N. INV</th>
<th style="width:70%">Désignation</th>
<th style="width:15%">Quantité</th>
</tr>
<?php foreach($items as $item): $count++;?>
<tr>
<td style="height:40px"><?php if($item['Item']['ref']!=null) echo $item['Item']['ref']; else echo "____"?></td>
<td style="text-align:left"><?php 
$item['Item']['desc']=strpos($item['Item']['desc'], " - ") ? substr($item['Item']['desc'], 0, strpos($item['Item']['desc'], " - ")) : $item['Item']['desc'];
echo $item['Item']['desc'];?></td>
<td>
<?php echo $item['Item']['qte']." ";
						if($item['Item']['typevaleur']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($item['Item']['typevaleur']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?>
</td>
</tr>
<?php endforeach; unset($item);?>
</table>
<?php }
if($count==0)
	echo "<h2>Aucun éléments à afficher</h2>";
 //echo $post['Facture']['facture'];
 ?></div>
<br/>




			
	</div>	
		<?php echo "<script>window.print();</script>";?>	
</div>
