<div class="affichage">
<?php 
$titre=$post['Facture']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:50%">
					<table>
						<tr><td>Intitulé </td><td><strong><?php echo $post['Facture']['nom'];?></strong></td></tr>
						<tr><td>Référence </td><td><strong><?php echo $post['Facture']['reference'];?></strong></td></tr>
						<tr><td>Date </td><td><strong><?php echo $post['Facture']['ladate'];?></strong></td></tr>
						<tr><td>N° Client </td><td><strong><?php echo $post['Facture']['client_id'];?></strong></td></tr>
						<?php if($post['Facture']['type']=="Bon de livraison"){ ?><tr><td>N° B.C: </td><td><strong><?php echo $post['Facture']['commande_id'];?></strong></td></tr><?php }?>
					</table>
					</td>
					
					<td style="width:35%">
					<?php if(isset($client) && $client){?>
					<table>
						<tr><td><strong><?php echo $client['Client']['nom'];?></strong></td></tr>
						<tr><td><?php echo $client['Client']['adressepostale']." - ".$client['Client']['codep']." - ".$client['Client']['ville']." - ".$client['Client']['pays'];?></td></tr>
						<tr><td>Contact: <strong><?php echo $client['Client']['civilite']." ".$client['Client']['prenom'];?></strong></td></tr>
						<tr><td>Tél: <strong><?php echo $client['Client']['tel'];?></strong></td></tr>
						<tr><td>Email: <strong><?php echo $client['Client']['email'];?></strong></td></tr>
					</table>
					<?php } ?>
					</td>
					
				</tr>
			
			</table>	
<br>
<div align="center">
<?php /*if($post['Commande']['type']=="A envoyer"){?><p ><strong style="font-size:30px">Demande De Prix</strong><br>Demande de réduction d'environ <?php echo $post['Commande']['remise'];?>%</p><?php } else{ ?><p style="font-size:30px"><strong>Arrivage des commandes</strong></p><?php } */?>
<?php  $count=0; if(isset($items) && $items){?>
<table >
<tr>
<th>Référence</th>
<th>Désignation</th>
<th>Qte</th>
<th>Prix unitaire</th>
<th>Montant HT</th>
</tr>
<?php foreach($items as $item): $count++;?>
<tr>
<td><?php echo $item['Item']['refitem'];?></td>
<td><?php echo $item['Item']['desc'];?></td>
<td><?php echo $item['Item']['qte'];?></td>
<td><?php echo $item['Item']['prix']?></td>
<td><?php echo $item['Item']['prix']*$item['Item']['qte']?></td>
</tr>
<?php endforeach; unset($item);?>
</table>
<?php }
if($count==0)
	echo "<h2>Aucun éléments à afficher</h2>";
 //echo $post['Facture']['facture'];
 ?></div>

			<table >
				<tr>
					<td style="width:35%">
						<table>
							<tr><td style="width:30%"><?php if($post['Facture']['type']=="Bon de livraison") echo "Bon en "; else echo "Facture en ";?></td><td><strong><?php echo $post['Facture']['devise'];?></strong></td></tr>
							<tr><td><?php if($post['Facture']['type']!="Facture") echo "Bon"; else echo "Facture";?>émise le</td><td><strong><?php echo $post['Facture']['datee'];?></strong></td></tr>
							<?php if($post['Facture']['etat']=="Réglée"){?><tr><td><?php if($post['Facture']['type']=="Bon de livraison") echo "Bon en "; else echo "Facture ";?>réglée le</td><td><strong><?php echo $post['Facture']['dater'];?></strong></td></tr><?php } ?>
						</table> 
						<?php echo $post['Facture']['infos'];?>
					</td>
					
					<td style="width:35%">
					<table>
						<tr><td>Total HT </td><td><?php echo $post['Facture']['montant']." ".$post['Facture']['devise'];
						$tva1=($post['Facture']['tva1']*$post['Facture']['montant'])/100;
						$tva2=($post['Facture']['tva2']*$post['Facture']['montant'])/100;
						$montant=$post['Facture']['montant']+$tva1+$tva2;
						$remise=($post['Facture']['remise']*$post['Facture']['montant'])/100;
						?></td></tr>
						<tr><td>TVA 1 <?php echo $post['Facture']['tva1']." %";?></td><td><?php echo $tva1." ".$post['Facture']['devise'];?></td></tr>
						<tr><td>TVA 2 <?php echo $post['Facture']['tva2']." %";?></td><td><?php echo $tva2." ".$post['Facture']['devise'];?></td></tr>
						<tr><td><strong>Total TTC </strong></td><td><strong><?php echo $montant." ".$post['Facture']['devise']?></strong></td></tr>
						<tr><td>Frais de dossier</td><td><strong><?php echo $post['Facture']['frais']; echo " ".$post['Facture']['devise']?></strong></td></tr>
						<tr><td>Remise <?php echo $post['Facture']['remise']." %";?></td><td><strong><?php echo $remise." ".$post['Facture']['devise']?></strong></td></tr>
						<tr><td><strong>A payer </strong></td><td><strong><?php echo $montant+$post['Facture']['frais']-$remise; echo " ".$post['Facture']['devise']?></strong></td></tr>
					</table>
					</td>
					
				</tr>
				<tr>
					<td style="width:35%"><strong></strong>
					</td>
					
					<td style="width:35%"><strong></strong>
					</td>
					
				</tr><tr>
					<td style="width:35%">DATE: <strong></strong>
					</td>
					
					<td style="width:35%">SIGNATURE: <strong></strong>
					</td>
					
				</tr>
				
			</table>
	</div>	
		<?php echo "<script>window.print();</script>";?>	
</div>