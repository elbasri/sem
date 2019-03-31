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
<?php echo $this->Form->create('Recette');
echo $this->Form->input('ref',array('label' => 'Reference de paiement'));?>
<table>
<tr><td style="width:50%"><?php echo $this->Form->input('article', array('legend'=>'Le Théme payée','required'=>'','type'=>'radio','options'=>array('1'=>'Article (du stock)','2'=>'Produit (du site web)','3'=>'Service (du site web)')));?></td>
	
	<td>
	<?php echo $this->Form->input('produit_id1', array('label'=>'L\'article','options' => $optionm,'style'=>'width: 100%'));?>
	<?php echo $this->Form->input('produit_id2', array('label'=>'Le produit','options' => $optionp,'style'=>'width: 100%'));?>
	<?php echo $this->Form->input('produit_id3', array('label'=>'La service','options' => $optionser,'style'=>'width: 100%'));?>
	</td>
</tr>
</table>
<?php
echo $this->Form->input('categorie_id', array('label'=>'Catégorie','options' => $optioncat,'style'=>'width: 100%'));
echo $this->Form->input('date',array('label' => 'Date'));
echo $this->Form->input('nom',array('label' => 'Payé à','value'=>'Banque'));
echo $this->Form->input('modep',array('label' => 'Mode de paiement','options'=>array('Virement bancaire'=>'Virement bancaire','Carte crédit'=>'Carte crédit','Carte débit'=>'Carte débit','Paiement comptant'=>'Paiement comptant')));
echo $this->Form->input('compte_id', array('label'=>'Compte','options' => $options,'style'=>'width: 100%'));
echo $this->Form->input('total',array('label' => 'Total HT'));
echo $this->Form->input('tvaen',array('label' => 'TVA (%)','value'=>$config['Configuration']['tva']));
//echo $this->Form->input('tva',array('label' => 'TVA payée'));
echo $this->Form->input('description',array('label' => 'Description'));
echo $this->Form->input('client_id', array('label'=>'Le Client (payeur)','options' => $optionf,'style'=>'width: 100%'));
echo $this->Form->end('Add');
?>

</div>