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
echo $this->Form->create('Agenda');
echo "<table>";
echo "<tr><td>".$this->Form->input('ref', array('label'=>'Référence'))."</td></tr>";
echo "<tr><td>".$this->Form->input('typep',array('label' => 'Sujet','options'=>array('Article du stock'=>'Article du stock','Produit du site web'=>'Produit du site web','Service du site web'=>'Service du site web','Devis'=>'Devis','Commande'=>'Commande','Facture'=>'Facture','autre'=>'Autre'),'onchange'=>'OnSelectionChange (this)'))."</td>";
echo "<td id='versa'>".$this->Form->input('projet_ida', array('label'=>'Article','options' => $stock,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='versp'>".$this->Form->input('projet_idp', array('label'=>'Produit','options' => $produits,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='verss'>".$this->Form->input('projet_ids', array('label'=>'Service','options' => $services,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='versd'>".$this->Form->input('projet_idd', array('label'=>'Devis','options' => $devis,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='versc'>".$this->Form->input('projet_idc', array('label'=>'Commande','options' => $commandes,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='versf'>".$this->Form->input('projet_idf', array('label'=>'Facture','options' => $factures,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='versl'>".$this->Form->input('projet_idl', array('label'=>'Titre'))."</td></tr>";
echo "<tr><td>".$this->Form->input('client_id', array('label'=>'Contact','options' => $clients,'style'=>'width: 100%'))."</td><td>".$this->Form->input('date', array('label'=>'Date'))."</td></tr>";
echo "<tr><td>".$this->Form->input('dated', array('label'=>'Début'))."</td><td>".$this->Form->input('datef', array('label'=>'Fin'))."</td></tr>";
echo "</table>";
echo $this->Form->end('Ajouter');
?>

<script type="text/javascript">

	function OnSelectionChange (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="stock"){
				document.getElementById('versa').style.display="block";
				document.getElementById('versp').style.display="none";
				document.getElementById('verss').style.display="none";
				document.getElementById('versd').style.display="none";
				document.getElementById('versc').style.display="none";
				document.getElementById('versf').style.display="none";
				document.getElementById('versl').style.display="none";
			}else if(selectedOption.value=="produit"){
				document.getElementById('versa').style.display="none";
				document.getElementById('versp').style.display="block";
				document.getElementById('verss').style.display="none";
				document.getElementById('versd').style.display="none";
				document.getElementById('versc').style.display="none";
				document.getElementById('versf').style.display="none";
				document.getElementById('versl').style.display="none";
			}else if(selectedOption.value=="service"){
				document.getElementById('versa').style.display="none";
				document.getElementById('versp').style.display="none";
				document.getElementById('verss').style.display="block";
				document.getElementById('versd').style.display="none";
				document.getElementById('versc').style.display="none";
				document.getElementById('versf').style.display="none";
				document.getElementById('versl').style.display="none";
			}else if(selectedOption.value=="devis"){
				document.getElementById('versa').style.display="none";
				document.getElementById('versp').style.display="none";
				document.getElementById('verss').style.display="none";
				document.getElementById('versd').style.display="block";
				document.getElementById('versc').style.display="none";
				document.getElementById('versf').style.display="none";
				document.getElementById('versl').style.display="none";
			}else if(selectedOption.value=="commande"){
				document.getElementById('versa').style.display="none";
				document.getElementById('versp').style.display="none";
				document.getElementById('verss').style.display="none";
				document.getElementById('versd').style.display="none";
				document.getElementById('versc').style.display="block";
				document.getElementById('versf').style.display="none";
				document.getElementById('versl').style.display="none";
			}else if(selectedOption.value=="facture"){
				document.getElementById('versa').style.display="none";
				document.getElementById('versp').style.display="none";
				document.getElementById('verss').style.display="none";
				document.getElementById('versd').style.display="none";
				document.getElementById('versc').style.display="none";
				document.getElementById('versf').style.display="block";
				document.getElementById('versl').style.display="none";
			}else if(selectedOption.value=="autre"){
				document.getElementById('versa').style.display="none";
				document.getElementById('versp').style.display="none";
				document.getElementById('verss').style.display="none";
				document.getElementById('versd').style.display="none";
				document.getElementById('versc').style.display="none";
				document.getElementById('versf').style.display="none";
				document.getElementById('versl').style.display="block";
			}
        }
    </script>
</div>