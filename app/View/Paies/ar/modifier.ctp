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
echo $this->Form->create('Paie');
echo $this->Form->input('employe_id', array('label'=>'L\'employe','options' => $options,'style'=>'width: 100%'));
echo "<table><tr><td>".$this->Form->input('ref',array('label' => 'Référence'))."</td><td>";
echo $this->Form->input('date',array('label' => 'Date'))."</td></tr></table>";
echo "<h2>Informations financières</h2>";
echo $this->Form->input('conges',array('label' => 'Dont indemnités de congés'));
echo $this->Form->input('noncotisations',array('label' => 'Dont indemnités non soumises à cotisations'));
echo $this->Form->input('salariales',array('label' => 'Cotisations salariales'));
echo $this->Form->input('autre',array('label' => 'Autres retenues'));
echo $this->Form->input('patronales',array('label' => 'Cotisations patronales'));
echo "<h2>Rémunération</h2>Temps de travail et taux horaire";
echo "<table><tr><td>".$this->Form->input('heures',array('label' => 'Heures'))."</td><td>";
echo $this->Form->input('euros',array('label' => $config['Configuration']['Devises']))."</td></tr></table>";
echo "<h2>Fiscalité</h2>";
echo $this->Form->input('imposable',array('label' => 'Rémunération imposable'));
echo "<h2>Droits à congés</h2>";
echo $this->Form->input('congesdumois',array('label' => 'Dates de congés du mois'));
echo $this->Form->input('congesacquis',array('label' => 'Jours de congés acquis '));
echo $this->Form->input('rttacquis',array('label' => 'Jours de RTT acquis '));
echo "<h2>Informations complémentaires</h2>";
echo "<table><tr><td>".$this->Form->input('coefficient',array('label' => 'Coefficient '))."</td><td>";
echo $this->Form->input('classification',array('label' => 'Classification'))."</td></tr></table>";
echo $this->Form->input('collective',array('label' => 'Convention collective '));
echo $this->Form->input('lieu',array('label' => 'Lieu de paiement'));
echo $this->Form->input('datep',array('label' => 'Date de paiement du salaire'));
echo $this->Form->input('infos',array('label' => 'Remarque','value'=>'DOCUMENT A CONSERVER SANS LIMITATION DE DUREE'));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Modifier');
?>
</div>



