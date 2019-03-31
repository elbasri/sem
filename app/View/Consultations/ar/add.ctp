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
 <?php echo $this->element('menudetails',array('type'=>'pages')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
<?php
echo $this->Form->create('Consultation');
echo $this->Form->input('titre',array('label'=>'Titre en français'));
echo $this->Form->input('titreen',array('label'=>'Titre en anglais'));
echo $this->Form->input('titrear',array('label'=>'Titre en arabe'));
?>
<table><tr><td>
<?php 
echo $this->Form->input('img',array('label' => 'Image du slide','id'=>'SliderPhoto'));?></td><td><br><br><br><h3>&nbsp;<a href="#" onclick="openFileBrowserSliderPhoto(); return false;" >Selectionner</a></h3></td></tr></table>
<?php
echo $this->Form->input('consultation',array('rows' => '5','label' => 'Détails de la page en français'));
echo $this->Form->input('consultationen',array('rows' => '5','label' => 'Détails de la page en anglais'));
echo $this->Form->input('consultationar',array('rows' => '5','label' => 'Détails de la page en arabe'));
echo $this->Form->input('etat',array('label'=>'L\'etat de cette page','options'=>array('1'=>'Publier','0'=>'Brouillon')));
echo $this->Form->input('accueil',array('label'=>'Affichage dans le slide','options'=>array('0'=>'Cacher sur le slide','1'=>'Afficher sur le slide')));
echo $this->Form->end('Ajouter');
?>

</div>