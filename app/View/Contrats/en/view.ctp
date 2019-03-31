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
$titre=$post['Contrat']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Contrat']['reference'];?></strong>
					</td>
					
					<td style="width:35%">Coût: <strong><?php echo $post['Contrat']['cout'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Contrat']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Type: <strong><?php echo $post['Contrat']['type'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">
					</td>
					
					<td style="width:35%">La société: <strong><?php echo $this->Html->link($post['Contrat']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Contrat']['client_id'],Inflector::slug($post['Contrat']['client_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Start date: <strong><?php echo $post['Contrat']['dated'];?></strong>
					</td>
					
					<td style="width:35%">End date: <strong><?php echo $post['Contrat']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Current Status: <strong><?php if(date('Y-m-d')>$post['Contrat']['datef']) echo "<font color='red'>Contrat expiré</font>"; else echo "<font color='green'>Contrat valide</font>";?></strong>
					</td>
					
					<td style="width:35%"></td>
				</tr>

			</table>	
<br><h2>Commentaire:</h2> 
<?php echo $post['Contrat']['commentaire'];?>

<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>contrats/modifier/<?php echo $post['Contrat']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>contrats/imprimer/<?php echo $post['Contrat']['id']?>" target="_blank"target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>contrats/imprimer/<?php echo $post['Contrat']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>