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
 <?php echo $this->element('menudetails',array('type'=>'comptat')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
<?php 
$titre=$post['Deplacement']['ref'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
<h2>Description du trajet</h2>	
			<table>
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Deplacement']['ref'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td style="width:35%">Country de destination: <strong><?php echo $post['Deplacement']['pays'];?></strong>
					</td>
					
					<td style="width:35%">Description: <strong><?php echo $post['Deplacement']['description'];?></strong>
					</td>
				</tr>
				
			</table>
<h2>Indemnités de déplacement</h2>
			<table>
				<tr >
					<td style="width:35%">Depuis le: <strong><?php echo $post['Deplacement']['dated'];?></strong>
					</td>
					
					<td style="width:35%">À: <strong><?php echo $post['Deplacement']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Taux: <strong><?php echo $post['Deplacement']['taux'];?></strong>
					</td>
					
				</tr>
			</table>		
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>deplacements/modifier/<?php echo $post['Deplacement']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>deplacements/imprimer/<?php echo $post['Deplacement']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>deplacements/imprimer/<?php echo $post['Deplacement']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>