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
 <?php echo $this->element('menudetails',array('type'=>'stock')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<?php echo $this->Form->create('Materiel'); ?>
<table>
<tr><td><?php echo $this->Form->input('ref',array('label' => 'Numéro d\'inventaire','value'=>$lastid)); ?></td> <td><?php echo $this->Form->input('nom',array('label' => 'Désignation')); ?></td></tr>
<tr><td><?php echo $this->Form->input('date',array('label' => 'Date')); ?></td> <td><?php echo $this->Form->input('typemateriel',array('label' => 'Type d\'article','options' =>array(
			'Matériel mobilier de bureau'=>'Matériel Mobilier de bureau',
			'Matériel informatique'=>'Matériel Informatique',
			'Matériel medicoHospitalier'=>'Matériel MedicoHospitalier',
			'Matériel medicoTechnique'=>'Matériel MedicoTechnique',
			"Matériel d'exploitation"=>'Matériel D\'exploitation',
			'Fourniture de bureau'=>'Fourniture de bureau',
			'Fourniture informatique'=>'Fourniture informatique',
			"Produits d'hygiène"=>"Produits d'hygiène"
					),'style'=>'width: 100%')); ?>
</td></tr>
<tr><td><?php echo $this->Form->input('fournisseur_id', array('label'=>'Fournisseur','options' => $optionsfo,'style'=>'width: 100%')); ?></td><td><?php echo $this->Form->input('conditionnement',array('label' => 'Conditionnement','value'=>'_')); ?></td></tr>

<tr><td style="width:50%"><?php echo $this->Form->input('type', array('legend'=>'Type de mesure','required'=>'','type'=>'radio','options'=>array('1'=>'Quantité','2'=>'Volume','3'=>'Poids'),'default'=>1));?></td>
	<td>
	<?php echo $this->Form->input('qte',array('label' => 'Valeur de mesure')); ?>
	<?php echo $this->Form->input('prix',array('label' => 'Prix d\'achat','value'=>'0')); ?>
	<?php /*echo $this->Form->input('max',array('label' => 'Stock Maximum')); ?>
	<?php echo $this->Form->input('min',array('label' => 'Stock Minimum')); */?>
	</td>
</tr>

<tr><td><?php echo $this->Form->input('piece_id', array('label'=>'Magasin','options' => $options,'style'=>'width: 100%')); ?></td> <td><?php echo $this->Form->input('emplacement',array('label' => 'Emplacement','value'=>'_'));?></td></tr>

</table> 
<?php
//echo $this->Form->input('infos',array('label' => 'Plus d\'informations sur l\'article'));
echo $this->Form->end('Ajouter');
?>

</div>