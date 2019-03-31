<div class="affichage">
<?php 
$titre=$post['Commande']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table border="0">
				<tr>
					<td style="width:50%">
					<table border="0">
						<tr><td style="width:30%">Intitulé </td><td><strong><?php echo $post['Commande']['nom'];?></strong></td></tr>
						<tr><td>Référence </td><td><strong><?php echo $post['Commande']['reference'];?></strong></td></tr>
						<tr><td>Date </td><td><strong><?php echo $post['Commande']['ladate'];?></strong></td></tr>
						<tr><td>N° <?php if($post['Commande']['type']=="A envoyer") echo " de Société "; else echo " du client ";?></td><td><strong><?php echo $post['Commande']['client_id'];?></strong></td></tr>
					</table>
					</td>
					
					<td style="width:35%">
					<table border="0">
						<tr><td><?php if($post['Commande']['type']=="A envoyer") echo "A "; else echo "De ";?><strong><?php echo $client['Client']['nom'];?></strong></td></tr>
						<tr><td><?php echo $client['Client']['adressepostale']." - ".$client['Client']['codep']." - ".$client['Client']['ville']." - ".$client['Client']['pays'];?></td></tr>
						<tr><td>Contact: <strong><?php echo $client['Client']['civilite']." ".$client['Client']['prenom'];?></strong></td></tr>
						<tr><td>Tél: <strong><?php echo $client['Client']['tel'];?></strong></td></tr>
						<tr><td>Email: <strong><?php echo $client['Client']['email'];?></strong></td></tr>
					</table>
					</td>
					
				</tr>
			
			</table>	

<div align="center">
<?php /*if($post['Commande']['type']=="A envoyer"){?><p ><strong style="font-size:30px">Demande De Prix</strong><br>Demande de réduction d'environ <?php echo $post['Commande']['remise'];?>%</p><?php } else{ ?><p style="font-size:30px"><strong>Arrivage des commandes</strong></p><?php } */?>
<?php echo $post['Commande']['commande'];?>
</div>

			<table border="0">
				<tr>
					<td style="width:60%">
						<table border="0">
							<tr><td style="width:30%">commande en</td><td><strong><?php echo $post['Commande']['devise'];?></strong></td></tr>
							<tr><td>commande émise le</td><td><strong><?php echo $post['Commande']['datee'];?></strong></td></tr>
						</table> 
						<?php echo $post['Commande']['infos'];?>
					</td>
					
					<td style="width:35%">
					<table border="0">
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
				
			</table>
		
		<table style="margin-top:20px" border="0">
		
				<tr >
					<td style="width:70%">DATE: <strong></strong>
					</td>
					
					<td >SIGNATURE: <strong></strong>
					</td>
					
				</tr>
		</table>
	</div>	
		<?php echo "<script>window.print();</script>";?>	
</div>