<?php
$tablet_browser = 0;
$mobile_browser = 0;
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
 
if ($tablet_browser > 0 || $mobile_browser > 0) {
 echo '<div class="affichage">';
}
else {
?>
<div class="menudetails">
 <?php echo $this->element('menudetails',array('type'=>'compta')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
<?php 
$titre=$post['Devise']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:50%">
					<table>
						<tr><td>Devis </td><td><strong><?php echo $post['Devise']['nom'];?></strong></td></tr>
						<tr><td>Référence </td><td><strong><?php echo $post['Devise']['reference'];?></strong></td></tr>
						<tr><td>Date </td><td><strong><?php echo $post['Devise']['ladate'];?></strong></td></tr>
						<tr><td>N° client </td><td><strong><?php echo $post['Devise']['client_id'];?></strong></td></tr>
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
<?php  
if($post['Devise']['typedevis']=="Standard"){
$count=0; if(isset($items) && $items){?>
<table >
<tr>
<th>Type</th>
<th>Référence</th>
<th>Désignation</th>
<th>Qte</th>
<th>Prix unitaire</th>
<th>Montant HT</th>
</tr>
<?php foreach($items as $item): $count++;?>
<tr>
<td><?php echo $item['Item']['typeitem'];?></td>
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
}
else 
	echo $post['Devise']['devis'];
 ?></div>

			<table >
				<tr>
					<td style="width:35%">
						<table>
							<tr><td>Devis en</td><td><strong><?php echo $post['Devise']['devise'];?></strong></td></tr>
							<tr><td>Statut du devis</td><td><strong><?php echo $post['Devise']['etat'];?></strong></td></tr>
							<tr><td>Type</td><td><strong><?php echo $post['Devise']['type'];?></strong></td></tr>
						</table> 
						<?php echo $post['Devise']['infos'];?>
					</td>
					
					<td style="width:35%">
					<table>
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

<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>devises/modifier/<?php echo $post['Devise']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>devises/imprimer/<?php echo $post['Devise']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>devises/imprimer/<?php echo $post['Devise']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>