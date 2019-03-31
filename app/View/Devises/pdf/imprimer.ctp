<div class="affichage"> 
<?php 
$titre=$post['Devise']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table border="0">
				<tr>
					<td style="width:50%">
					<table border="0">
						<tr><td style="width:30%">Devis </td><td><strong><?php echo $post['Devise']['nom'];?></strong></td></tr>
						<tr><td>Référence </td><td><strong><?php echo $post['Devise']['reference'];?></strong></td></tr>
						<tr><td>Date </td><td><strong><?php echo $post['Devise']['ladate'];?></strong></td></tr>
						<tr><td>N° client </td><td><strong><?php echo $post['Devise']['client_id'];?></strong></td></tr>
					</table>
					</td>
					
					<td style="width:35%">
					<table border="0">
						<tr><td>A: <strong><?php echo $client['Client']['nom'];?></strong></td></tr>
						<tr><td><?php echo $client['Client']['adressepostale']." - ".$client['Client']['codep']." - ".$client['Client']['ville']." - ".$client['Client']['pays'];?></td></tr>
						<tr><td>Contact: <strong><?php echo $client['Client']['civilite']." ".$client['Client']['prenom'];?></strong></td></tr>
						<tr><td>Tél: <strong><?php echo $client['Client']['tel'];?></strong></td></tr>
						<tr><td>Email: <strong><?php echo $client['Client']['email'];?></strong></td></tr>
					</table>
					</td>
					
				</tr>
			
			</table>	

<div align="center"><?php echo $post['Devise']['devis'];?></div>

			<table border="0">
				<tr>
					<td style="width:60%">
						<table border="0">
							<tr><td style="width:30%">Devis en</td><td><strong><?php echo $post['Devise']['devise'];?></strong></td></tr>
							<!--<tr><td>Etat du devis</td><td><strong><?php echo $post['Devise']['etat'];?></strong></td></tr>
							<tr><td>Type</td><td><strong><?php echo $post['Devise']['type'];?></strong></td></tr>-->
						</table> 
						<?php echo $post['Devise']['infos'];?>
					</td>
					
					<td style="width:35%">
					<table border="0">
						<tr><td>Total HT </td><td><?php echo $post['Devise']['montant']." ".$post['Devise']['devise'];
						$tva1=($post['Devise']['tva1']*$post['Devise']['montant'])/100;
						$tva2=($post['Devise']['tva2']*$post['Devise']['montant'])/100;
						$montant=$post['Devise']['montant']+$tva1+$tva2;
						$remise=($post['Devise']['remise']*$post['Devise']['montant'])/100;
						?></td></tr>
						<tr><td>TVA : <?php echo $post['Devise']['tva1']." %";?></td><td><?php echo $tva1." ".$post['Devise']['devise'];?></td></tr>
						<?php if($post['Devise']['tva2']!=0){?><tr><td>TVA 2 : <?php echo $post['Devise']['tva2']." %";?></td><td><?php echo $tva2." ".$post['Devise']['devise'];?></td></tr><?php }?>
						<tr><td><strong>Total TTC </strong></td><td><strong><?php echo $montant." ".$post['Devise']['devise']?></strong></td></tr>
						<?php if($post['Devise']['frais']!=0){?><tr><td>Frais de dossier</td><td><strong><?php echo $post['Devise']['frais']; echo " ".$post['Devise']['devise']?></strong></td></tr><?php }?>
						<tr><td>Remise : <?php echo $post['Devise']['remise']." %";?></td><td><strong><?php echo $remise." ".$post['Devise']['devise']?></strong></td></tr>
						<tr><td><strong>A payer </strong></td><td><strong><?php echo $montant+$post['Devise']['frais']-$remise; echo " ".$post['Devise']['devise']?></strong></td></tr>
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