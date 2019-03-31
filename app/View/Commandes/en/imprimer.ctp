<div class="affichage">
<?php 
$titre=$post['Commande']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:50%">
					<table>
						<tr><td>Intitulé </td><td><strong><?php echo $post['Commande']['nom'];?></strong></td></tr>
						<tr><td>Reference </td><td><strong><?php echo $post['Commande']['reference'];?></strong></td></tr>
						<tr><td>Date </td><td><strong><?php echo $post['Commande']['ladate'];?></strong></td></tr>
						<tr><td>N° <?php if($post['Commande']['type']=="A envoyer") echo " de Société "; else echo " du client ";?></td><td><strong><?php echo $post['Commande']['client_id'];?></strong></td></tr>
					</table>
					</td>
					
					<td style="width:35%">
					<?php if(isset($client) && $client){?>
					<table>
						<tr><td><?php if($post['Commande']['type']=="A envoyer") echo "A: "; else echo "De";?><strong><?php echo $client['Client']['nom'];?></strong></td></tr>
						<tr><td><?php echo $client['Client']['adressepostale']." - ".$client['Client']['codep']." - ".$client['Client']['ville']." - ".$client['Client']['pays'];?></td></tr>
						<tr><td>Contact: <strong><?php echo $client['Client']['civilite']." ".$client['Client']['prenom'];?></strong></td></tr>
						<tr><td>Phone: <strong><?php echo $client['Client']['tel'];?></strong></td></tr>
						<tr><td>Email: <strong><?php echo $client['Client']['email'];?></strong></td></tr>
					</table>
					<?php } ?>
					</td>
					
				</tr>
			
			</table>	

<div align="center">
<?php /*if($post['Commande']['type']=="A envoyer"){?><p ><strong style="font-size:30px">Demande De Prix</strong><br>Demande de réduction d'environ <?php echo $post['Commande']['remise'];?>%</p><?php } else{ ?><p style="font-size:30px"><strong>Arrivage des commandes</strong></p><?php } */?>
<?php  $count=0; if(isset($items) && $items){?>
<table >
<tr>
<th>Reference</th>
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
 //echo $post['Commande']['commande'];?>
</div>

			<table >
				<tr>
					<td style="width:35%">
						<table>
							<tr><td>commande en</td><td><strong><?php echo $post['Commande']['devise'];?></strong></td></tr>
						</table> 
						<?php echo $post['Commande']['infos'];?>
					</td>
					
					<td style="width:35%">
					<table>
						<tr><td>Total HT </td><td><?php echo $post['Commande']['montant']." ".$post['Commande']['devise'];
						$tva1=($post['Commande']['tva1']*$post['Commande']['montant'])/100;
						$montant=$post['Commande']['montant']+$tva1;
						$remise=($post['Commande']['remise']*$post['Commande']['montant'])/100;
						?></td></tr>
						<tr><td>TVA <?php echo $post['Commande']['tva1']." %";?></td><td><?php echo $tva1." ".$post['Commande']['devise'];?></td></tr>
						<tr><td><strong>Total TTC </strong></td><td><strong><?php echo $montant." ".$post['Commande']['devise']?></strong></td></tr>
						<?php if($post['Commande']['remise']!=0){ ?><tr><td><?php if($post['Commande']['type']=="A envoyer")echo "Demande de réduction d'environ"; else echo "Remise";?> </td><td><?php echo $post['Commande']['remise'];?>%</td></tr><?php }?>
						<tr><td><strong>NET APAYER </strong></td><td><strong><?php echo $montant-$remise; echo " ".$post['Commande']['devise']?></strong></td></tr>
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