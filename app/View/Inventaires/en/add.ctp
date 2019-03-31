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
 <?php echo $this->element('menudetails',array('type'=>'inventaire')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<table>
<tr><td><?php echo $this->Form->input('ref',array('label' => 'Reference')); ?></td>  <td><?php echo $this->Form->input('nom',array('label' => 'Libellé')); ?></td></tr>
<tr><td><?php echo $this->Form->input('designation',array('label' => 'Désignation')); ?></td>  <td><?php echo $this->Form->input('categorie',array('label' => 'Catégorie','options'=>array('Meubles'=>'Meubles','Eletroménager'=>'Eletroménager','Informatique'=>'Informatique','Phoneéphonie'=>'Phoneéphonie','Hi-Tech'=>'Hi-Tech','Véhicule'=>'Véhicule','Autres'=>'Autres'))); ?></td></tr>
<tr><td><?php echo $this->Form->input('testcontratg',array('label' => 'Contrat de garantie?','type'=>'checkbox'));?></td><td><?php echo $this->Form->input('contratg_id',array('label' => 'Si oui, Choisire une contrat','options' => $contratg));?></td></tr>
<tr><td><?php echo $this->Form->input('testcontratm',array('label' => 'Contrat de Maintenance?','type'=>'checkbox'));?></td><td><?php echo $this->Form->input('contratm_id',array('label' => 'Si oui, Choisire une contrat','options' => $contratm));?></td></tr>
<tr><td><?php echo $this->Form->input('testcontrata',array('label' => 'Contrat d\'assurance?','type'=>'checkbox'));?></td><td><?php echo $this->Form->input('contrata_id',array('label' => 'Si oui, Choisire une contrat','options' => $contrata));?></td></tr>
<tr><td><?php echo $this->Form->input('testcontratl',array('label' => 'Contrat de location?','type'=>'checkbox'));?></td><td><?php echo $this->Form->input('contratl_id',array('label' => 'Si oui, Choisire une contrat','options' => $contratl));?></td></tr>
<tr><td><?php echo $this->Form->input('fournisseur_id', array('label'=>'Fournisseur','options' => $optionsfo,'style'=>'width: 100%')); ?></td>  <td><?php echo $this->Form->input('prix',array('label' => 'Prix d\'achat','value'=>'0')); ?></td></tr>
<tr><td><?php echo $this->Form->input('qte',array('label' => 'Quantité','value'=>'0')); ?></td>  <td><?php echo $this->Form->input('prixv',array('label' => 'Valeur Marchande','value'=>'0')); ?></td></tr>
<tr><td><?php echo $this->Form->input('facture_id', array('label'=>'Facture','options' => $optionsc,'style'=>'width: 100%')); ?></td>  <td></td></tr>
<tr><td><?php echo $this->Form->input('fabricant_id', array('label'=>'Fabricant','options' => $optionsfb,'style'=>'width: 100%')); ?></td>  <td><?php echo $this->Form->input('reffabricant', array('label'=>'Ref. Fabricant')); ?></td></tr>
<tr><td><?php echo $this->Form->input('marque_id', array('label'=>'Marque','options' => $optionsm,'style'=>'width: 100%')); ?></td>  <td><?php echo $this->Form->input('famille_id', array('label'=>'Famille','options' => $optionsfa,'style'=>'width: 100%')); ?></td></tr>
<tr><td><?php echo $this->Form->input('piece_id', array('label'=>'Localisation','options' => $options,'style'=>'width: 100%')); ?></td>  <td><?php echo $this->Form->input('emplacement',array('label' => 'Emplacement')); ?></td></tr>
<tr><td><?php echo $this->Form->input('etat',array('label' => 'Etat','options'=>array('Bon'=>'Bon','Mauvaise'=>'Mauvaise','Moyen'=>'Moyen','Très bon'=>'Très bon'))); ?></td>  <td><?php echo $this->Form->input('niveau',array('label' => 'Niveau','options'=>array('Grande valeur'=>'Grande valeur','Précieux'=>'Précieux','Sentimental'=>'Sentimental','Standard'=>'Standard','Très grande valeur'=>'Très grande valeur'))); ?></td></tr>

</table>
<?php
echo $this->Form->input('infos',array('label' => 'Plus de details'));
echo $this->Form->end('Add');
?>

</div>