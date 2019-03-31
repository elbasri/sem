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
 <?php echo $this->element('menudetails',array('type'=>'employes')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<?php 
$titre=$post['Paie']['ref'];
$this->element('meta',array('titre'=>$titre));
?>

		<div class="infosdemande" >
	<br><br>
			<table border="0">
				<tr><td style="width:45%"><strong>Employeur</strong></td><td style="width:45%"><strong>Salarié</strong></td></tr>
			</table>
			<table>
				<tr>
					<td style="width:45%">
					<table border="0">
						<tr><td>Etablissement </td><td><strong><?php echo $config['Configuration']['titre'];?></strong></td></tr>
						<?php if(!empty($config['Configuration']['siret'])){ ?><tr><td>SIRET </td><td><strong><?php echo $config['Configuration']['siret'];?></strong></td></tr><?php }?>
						<?php if(!empty($config['Configuration']['ape'])){ ?><tr><td>APE </td><td><strong><?php echo $config['Configuration']['ape'];?></strong></td></tr><?php }?>
						<tr><td><br></td><td><strong></strong></td></tr>
						<tr><td>Adresse de l'établissement  </td><td><strong><?php echo "<font size='2'>".$config['Configuration']['adresse']."<br>".$config['Configuration']['codep']." - ".$config['Configuration']['ville']." - ".$config['Configuration']['pays']."</font>";?></strong></td></tr>
						
					</table>
					</td>
					
					<td style="width:45%">
					<table border="0">
						<tr><td>Name </td><td><strong><?php echo $employe['Employe']['nom'];?></strong></td></tr>
						<tr><td>PRENOM </td><td><strong><?php echo $employe['Employe']['prenom'];?></strong></td></tr>
						<?php if($employe['Employe']['matricule']!=0){ ?><tr><td>Matricule </td><td><strong><?php echo $employe['Employe']['matricule'];?></strong></td></tr><?php }?>
						<?php if($employe['Employe']['cnss']!=0){ ?><tr><td>N° de sécurité sociale </td><td><strong><?php echo $employe['Employe']['cnss'];?></strong></td></tr><?php }?>
						<tr><td>Adresse</td><td><strong><?php echo $employe['Employe']['adressepostale']." - ".$employe['Employe']['codep']." - ".$employe['Employe']['ville']." - ".$employe['Employe']['pays'];?></td></tr>
						
					</table>
					</td>
					
				</tr>
			
			</table>	
<br><br>
			<table border="0">
				<tr><td style="width:50%"><strong>Informations financières</strong></td><td></td></tr>
			</table>
			<table>
				<tr>
					<td style="width:50%">
					<table border="0">
						<tr><td style="width:60%"><strong>Rémunération brute et indemnités du mois</strong></td><td><strong><?php echo $post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations'];?></strong></td></tr>
						<tr><td>Dont salaire mensuel </td><td><?php echo $post['Paie']['mensuel'];?></td></tr>
						<tr><td>Dont indemnités de congés </td><td><?php echo $post['Paie']['conges'];?></td></tr>
						<tr><td>Dont indemnités non soumises à cotisations </td><td><?php echo $post['Paie']['noncotisations'];?></td></tr>
						<tr><td><br></td><td><strong></strong></td></tr>
						<tr><td>Cotisations salariales </td><td><strong><?php echo $post['Paie']['salariales'];?></strong></td></tr>
						<tr><td>Autre</td><td><strong><?php echo $post['Paie']['autre'];?></strong></td></tr>
						<tr><td style="width:30%"><strong>Net à payer </strong></td><td><strong><?php echo $post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations']-$post['Paie']['salariales']-$post['Paie']['autre'];?></strong></td></tr>
						<tr><td>Cotisations patronales </td><td><strong><?php echo $post['Paie']['patronales'];?></strong></td></tr>
						<tr><td style="width:30%"><strong>Coût total employeur </strong></td><td><strong><?php echo $post['Paie']['mensuel']+$post['Paie']['conges']+$post['Paie']['noncotisations']+$post['Paie']['patronales'];?></strong></td></tr>
					</table>
					</td>
					
					<td style="width:35%">
					<table border="0">
						<tr>
							<td><strong>Rémunération</strong><br>Temps de travail et taux horaire
								<table border="0">
									<tr><td>Heures</td><td><strong><?php echo $post['Paie']['heures'];?></strong></td></tr>
									<tr><td><?php echo $config['Configuration']['Devises'];?></td><td><strong><?php echo $post['Paie']['euros'];?></strong></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td><strong>Fiscalité</strong>
								<table border="0">
									<tr><td style="width:60%">Rémunération imposable depuis le <?php echo $post['Paie']['date'];?></td><td><strong><?php echo $post['Paie']['imposable'];?></strong></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td><strong>Droits à congés</strong>
								<table border="0">
									<tr><td>Dates de congés du mois </td><td><strong><?php echo $post['Paie']['congesdumois'];?></strong></td></tr>
									<tr><td>Jours de congés acquis </td><td><strong><?php echo $post['Paie']['congesacquis'];?></strong></td></tr>
									<tr><td>Jours de RTT acquis </td><td><strong><?php echo $post['Paie']['rttacquis'];?></strong></td></tr>
								</table>
							</td>
						</tr>
						
					</table>
					</td>
					
				</tr>
			
			</table>	
<br><br>
		<strong>Droits à congés</strong>
		<table >
				<tr>
					<td >
						<table border="0">
								<tr >
									<td style="width:70%">Emploi - contrat : <strong><?php echo $employe['Employe']['specialite'];?></strong>
									</td>
									<td 
									</td>
								</tr>
								<tr >
									<td style="width:70%">Coefficient : <strong><?php echo $post['Paie']['coefficient'];?></strong>
									</td>
									<td >Classification : <strong><?php echo $post['Paie']['classification'];?></strong>
									</td>
								</tr>
								<tr >
									<td style="width:70%">Convention collective: <strong><?php echo $post['Paie']['collective'];?></strong>
									</td>
									<td >Lieu de paiement: <strong><?php echo $post['Paie']['lieu'];?></strong>
									</td>
								</tr>
						</table>
					</td>
				</tr>
		</table>
		<table style="margin-top:20px" border="0">
		
				<tr >
					<td>Date de paiement du salaire: <strong><?php echo $post['Paie']['datep'];?></strong>
					</td>
				</tr>
		</table>
		<br>
		<?php echo $post['Paie']['infos'];?>

<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>paies/modifier/<?php echo $post['Paie']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>paies/imprimer/<?php echo $post['Paie']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>paies/imprimer/<?php echo $post['Paie']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>							
	</div>	
		
</div>