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
<tr><td><?php echo $this->Form->input('ref',array('label' => 'Reference')); ?></td> <td><?php echo $this->Form->input('nom',array('label' => 'Libellé')); ?></td></tr>
<tr><td><?php echo $this->Form->input('date',array('label' => 'Date de stock')); ?></td> <td><?php echo $this->Form->input('conditionnement',array('label' => 'Conditionnement')); ?></td></tr>
<tr><td><?php echo $this->Form->input('designation',array('label' => 'Désignation')); ?></td> <td>
<?php //echo $this->Form->input('unite',array('label' => 'Unité')); ?></td></tr>
<tr><td><?php echo $this->Form->input('fournisseur_id', array('label'=>'Fournisseur','options' => $optionsfo,'style'=>'width: 100%')); ?></td> <td><?php echo $this->Form->input('fabricant_id', array('label'=>'Fabricant','options' => $optionsfb,'style'=>'width: 100%')); ?></td></tr>
<tr><td><?php echo $this->Form->input('commande_id', array('label'=>'Commande','options' => $optionsc,'style'=>'width: 100%')); ?></td> <td><?php echo $this->Form->input('reffabricant', array('label'=>'Ref. Fabricant')); ?></td></tr>
<tr><td><?php echo $this->Form->input('imputation_id', array('label'=>'Imputation','options' => $optionsi,'style'=>'width: 100%')); ?></td> <td><?php echo $this->Form->input('marque_id', array('label'=>'Marque','options' => $optionsm,'style'=>'width: 100%')); ?></td></tr>
<tr><td><?php echo $this->Form->input('famille_id', array('label'=>'Famille','options' => $optionsfa,'style'=>'width: 100%')); ?></td> <td></td></tr>
<tr><td><?php echo $this->Form->input('bentree',array('label' => 'Blocage entrée','options' =>array('non'=>'non','oui'=>'oui'))); ?></td> <td><?php echo $this->Form->input('bsortie',array('label' => 'Blocage sortie','options' =>array('non'=>'non','oui'=>'oui'))); ?></td></tr>
<tr><td><?php echo $this->Form->input('critique',array('label' => 'Article critique')); ?></td> <td><?php 
echo $this->Form->input('danger',array('label' => 'Classe Mat. Dangeureuse')); ?></td></tr>

<tr><td style="width:50%"><?php echo $this->Form->input('type', array('legend'=>'Type de mesure','required'=>'','type'=>'radio','options'=>array('1'=>'Quantité','2'=>'Volume','3'=>'Poids')));?></td>
	<td>
	<?php echo $this->Form->input('qte',array('label' => 'Valeur de mesure')); ?>
	<?php echo $this->Form->input('max',array('label' => 'Stock Maximum')); ?>
	<?php echo $this->Form->input('min',array('label' => 'Stock Minimum')); ?>
	</td>
</tr>
<tr><td><?php echo $this->Form->input('taillelot',array('label' => 'Taille du lot')); ?></td> <td><?php echo $this->Form->input('sec',array('label' => 'Stock de Sécurité')); ?></td></tr>
<tr><td><?php echo $this->Form->input('poids',array('label' => 'Poids')); ?></td> <td><?php echo $this->Form->input('volume',array('label' => 'Volume')); ?></td></tr>
<tr><td><?php echo $this->Form->input('prix',array('label' => 'Prix d\'achat')); ?></td> <td><?php echo $this->Form->input('prixv',array('label' => 'Prix de vente'));  ?></td></tr>
<tr><td><?php echo $this->Form->input('piece_id', array('label'=>'Magasin','options' => $options,'style'=>'width: 100%')); ?></td> <td><?php echo $this->Form->input('emplacement',array('label' => 'Emplacement'));?></td></tr>
<tr><td><?php echo "<h3>Durée de conservation:</h3>"; ?></td> <td></td></tr>
<tr><td><?php echo $this->Form->input('dated',array('label' => 'A partir')); ?></td> <td><?php echo $this->Form->input('datef',array('label' => 'Jusqu\'à')); ?></td></tr>
</table> 
<?php
echo $this->Form->input('infos',array('label' => 'Plus d\'informations sur l\'article'));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Edit');
?>
</div>



