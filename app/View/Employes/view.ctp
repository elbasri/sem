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
$titre=$user['Employe']['nom'];
$this->element('meta',array('titre'=>$titre));
//$img = "http://".$_SERVER['SERVER_NAME'].$user['Employe']['img'];
$img = "http://".$_SERVER['SERVER_NAME'].$user['Employe']['img'];
?>

	<div class="infosdemande" >
		
			<table >
			<?php if(!empty($user['Employe']['img'])){?>
				<tr >
					<td style="width:5%">
					</td>
					<td style="width:35%"><?php echo $this->Html->image($img, array('alt' => '','style'=>'width:50%;height:60%;'));?>
					</td>
					
					<td style="width:5%"></td>
					<td style="width:35%">Nom: <strong><?php echo $user['Employe']['nom'];?></strong>
					<br><br>Prénom: <strong><?php echo $user['Employe']['prenom'];?></strong>
					<br><br>CIN: <strong><?php echo $user['Employe']['cin'];?></strong>
					<br><br>Date d'expiration de CIN: <strong><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']) echo "<br><font color='red'>CIN expiré</font>";?></strong>
					<br><br>Date de naissance: <strong><?php echo $user['Employe']['datenaissance'];?></strong>
					</td>
					
				</tr>
				<?php }else{?>
				<tr >
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td style="width:35%">Nom: <strong><?php echo $user['Employe']['nom'];?></strong>
					</td>
					
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td style="width:35%">Prénom: <strong><?php echo $user['Employe']['prenom'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td>CIN: <strong><?php echo $user['Employe']['cin'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td>Date d'expiration de CIN: <strong><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']) echo "<br><font color='red'>CIN expiré</font>";?></strong>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td>Date de naissance: <strong><?php echo $user['Employe']['datenaissance'];?></strong>
					</td>
					
					<td></td>
					<td></td>
					
				</tr>
				
				<?php }?>
				<tr>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td>Civilité: <strong><?php echo $user['Employe']['civilite'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => '','title'=>''));?></td>
					<td>Téléphone: <strong><?php echo $user['Employe']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td>Le Pays/Nationalité: <strong><?php echo $user['Employe']['pays'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td>Ville: <strong><?php echo $user['Employe']['ville'];?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td>Code Postale: <strong><?php echo $user['Employe']['codep'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td>Adresse: <strong><?php echo $user['Employe']['adressepostale'];?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td>Date de début du contrat: <strong><?php echo $user['Employe']['datetravail'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td>Date de fin du contrat: <strong><?php echo $user['Employe']['datefintravail']; if(date('Y-m-d')>$user['Employe']['datefintravail']) echo "<br><font color='red'>Contrat expiré</font>";?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td>Spécialité: <strong><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></strong>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td>Salaire: <strong><?php if($user['Employe']['salaire']!=0) echo $user['Employe']['salaire']." ".$config['Configuration']['Devises']; else echo "indéfinie";?></strong>
					</td>
				</tr>
				
				<tr>
					<?php if($user['Employe']['cnss']!=0){?>
					<td><?php echo $this->Html->image('icons/lock.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td>N° de sécurité sociale : <strong><?php echo $user['Employe']['cnss'];?></strong>
					</td>
					<?php } if($user['Employe']['matricule']!=0){?>
					<td><?php echo $this->Html->image('icons/lock.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td>Matricule : <strong><?php echo $user['Employe']['matricule'];?></strong>
					</td>
					<?php }?>
				</tr>
				<?php if(!empty($user['Employe']['contrat'])){?>
				<tr>
					<td><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td><strong><a href="<?php echo $user['Employe']['contrat'];?>">Cliquer ici pour télécharger le contrat</a></strong>
					</td>
					<td></td>
					<td>
					</td>
				</tr>
				<?php }?>
			</table>	
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>employes/edit/<?php echo $user['Employe']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier l'employe"/></a>
					<a href="<?=$this->Html->url('/')?>employes/imprimer/<?php echo $user['Employe']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>employes/imprimer/<?php echo $user['Employe']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>