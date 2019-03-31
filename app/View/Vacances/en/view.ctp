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
$titre=$post['Vacance']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:35%">Reference: <strong><?php echo $post['Vacance']['ref'];?></strong>
					</td>
					<td style="width:35%">Due of leave: <strong><?php echo $post['Vacance']['nom'];?></strong>
					</td>
				</tr>
			
				<tr >
					<td style="width:35%">Type of leave: <strong><?php echo $post['Vacance']['type'];?></strong>
					</td>
					<td style="width:35%"><?php if($post['Vacance']['cout']!=0){ ?>Taux: <strong><?php echo $post['Vacance']['cout']." ".$config['Configuration']['Devises'];?></strong><?php }?>
					</td>
				</tr>
			
				
				<tr >
					<td style="width:35%">Start date: <strong><?php echo $post['Vacance']['dated'];?></strong>
					</td>
					<td style="width:35%">End date: <strong><?php echo $post['Vacance']['datef'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">The employee (benefit): <strong><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></strong><br>
					Number of employees: <strong><?php echo $post['Vacance']['employe_id'];?></strong>
					</td>
					<td style="width:35%"> <strong></strong>
					</td>
				</tr>
				<tr >
					<td>Current Status: <strong><?php if(date('Y-m-d')>$post['Vacance']['datef']) echo "<font color='red'>leave Done</font>"; else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated'])echo "<font color='green'>Current leave</font>"; else if (date('Y-m-d')<$post['Vacance']['dated'])echo "<font color='blue'>Upcoming leave</font>";?></strong>
					</td>
					
					<td>
					</td>
					
				</tr>

			</table>
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>vacances/modifier/<?php echo $post['Vacance']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>vacances/imprimer/<?php echo $post['Vacance']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>vacances/imprimer/<?php echo $post['Vacance']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>