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
 <?php echo $this->element('menudetails',array('type'=>'crm')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>

<?php 
$titre=$user['Client']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:5%"><?php echo $this->Html->image('icons/username.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe')); ?>
					</td>
					<td style="width:35%">Référence: <strong><?php echo $user['Client']['ref'];?></strong>
					</td>
					
					<td style="width:5%"></td>
					<td style="width:35%">
					</td>
					
				</tr>
				<tr>
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe')); ?>
					</td>
					<td style="width:35%">Societé: <strong><?php echo $user['Client']['nom'];?></strong>
					</td>
					
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Le Prénom','title'=>'ajouter un employe'));?></td>
					<td style="width:35%">Contact: <strong><?php echo $user['Client']['prenom'];?></strong>
					</td>
					
				</tr>
				
				<tr>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe')); ?>
					</td>
					<td>Civilité: <strong><?php echo $user['Client']['civilite'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Téléphone: <strong><?php echo $user['Client']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Pays: <strong><?php echo $user['Client']['pays'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Ville: <strong><?php echo $user['Client']['ville'];?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Code Postale: <strong><?php echo $user['Client']['codep'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Adresse: <strong><?php echo $user['Client']['adressepostale'];?></strong>
					</td>
				</tr>

				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Email: <strong><?php echo $user['Client']['email'];?></strong>
					</td>
					<td></td>
					<td></td>
				</tr>

			</table>
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>clients/edit/<?php echo $user['Client']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>clients/imprimer/<?php echo $user['Client']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>clients/imprimer/<?php echo $user['Client']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>
	</div>

</div>