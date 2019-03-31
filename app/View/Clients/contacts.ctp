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

<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" style="width:40%;float:left;margin-left:15px">
		<a href="<?=$this->Html->url('/clients/clients')?>" class="mega-link btn widthcent2"><font class="widthcent3">Clients</font></a>
		</li>
		<li class="mega mega-current widthcent4" style="width:40%;float:left;margin-left:15px">
		<a href="<?=$this->Html->url('/clients/fournisseurs')?>" class="mega-link btn widthcent2"><font class="widthcent3">Fournisseurs</font></a>
		</li>
		<li class="mega mega-current widthcent4" style="width:40%;float:left;margin-left:15px">
		<a href="<?=$this->Html->url('/clients/societem')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sociétés de maintenance</font></a>
		</li>
		<li class="mega mega-current widthcent4" style="width:40%;float:left;margin-left:15px">
		<a href="<?=$this->Html->url('/clients/societea')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sociétés d'assurance</font></a>
		</li>
		<li class="mega mega-current widthcent4" style="width:40%;float:left;margin-left:15px">
		<a href="<?=$this->Html->url('/clients/societel')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sociétés de location</font></a>
		</li>
		<li class="mega mega-current widthcent4" style="width:40%;float:left;margin-left:15px">
		<a href="<?=$this->Html->url('/clients/fabricants')?>" class="mega-link btn widthcent2"><font class="widthcent3">Fabricants</font></a>
		</li>
	</ul>
	</div>
</div>
</div>