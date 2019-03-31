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
 <?php echo $this->element('menudetails',array('type'=>'compta')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
<?php
echo $this->Form->create('Facture');
echo "<table><tr><td>".$this->Form->input('venteachat',array('label' => 'Type d\'opération','options'=>array('Ventes'=>'Ventes','Achats'=>'Achats'),'onchange'=>'OnSelectionChanget (this)'))."</td><td>";
echo $this->Form->input('ladate',array('label' => 'Date'))."</td></tr></table>";
?>
<div id='ventes'>
	<table><tr>
	<?php
	echo "<td>".$this->Form->input('typev',array('label' => 'Type de facture','options'=>array('Facture'=>'Facture','Bon de livraison'=>'Bon de livraison'),'onchange'=>'OnSelectionChange (this)'))."</td>";
	echo "<td style='display:none' id='versf'>".$this->Form->input('commande_idv', array('label'=>'Le bon de Commande','options' => $optionsc,'style'=>'width: 100%'))."</td>";
	?>
	</tr></table>
	<?php
	echo $this->Form->input('client_idv', array('label'=>'Le Client','options' => $options,'style'=>'width: 100%'));
	?>
</div>
<div style='display:none' id='achats'>
	<table><tr>
	<?php
	echo "<td>".$this->Form->input('typea',array('label' => 'Type','options'=>array('Facture'=>'Facture','Bon de réception'=>'Bon de réception'),'onchange'=>'OnSelectionChangea (this)'))."</td>";
	echo "<td style='display:none' id='vers'>".$this->Form->input('commande_ida', array('label'=>'La Commande','options' => $optionsc,'style'=>'width: 100%'))."</td>";
	?>
	</tr></table>
	<?php
	echo $this->Form->input('client_ida', array('label'=>'Fournisseur/société','options' => $optionsf,'style'=>'width: 100%'));
	?>
</div>
<table><tr><td>
<?php
echo $this->Form->input('nom',array('label' => 'Intitulé'))."</td><td>";
echo $this->Form->input('reference',array('label' => 'Référence'))."</td></tr><tr><td>";
echo $this->Form->input('devise',array('label' => 'Devise','value' => $config['Configuration']['Devises']))."</td><td>";
echo $this->Form->input('tva1',array('label' => 'TVA1 %','value'=>$config['Configuration']['tva']))."</td></tr>";
//$facture='<table align="center"  cellpadding="1" cellspacing="1" ><thead><tr><th scope="col"><strong>QTE</strong></th><th scope="col"><strong>Libellé</strong></th><th scope="col"><strong>Description</strong></th><th scope="col">Prix Unitaire</th><th scope="col">Total</th></tr></thead><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p>&nbsp;</p>';
//echo $this->Form->input('facture',array('label' => 'Détails','value'=>$facture));
//echo $this->Form->input('montant',array('label' => 'Montant TTC'));

echo "<tr><td>".$this->Form->input('typearticle',array('label' => 'Type D\'article','options'=>array('Article du stock'=>'Article du stock','Produit du site'=>'Produit du site','Service du site'=>'Service du site'),'onchange'=>'OnSelectionChangeaa (this)'))."</td>";
echo "<td id='stock'>".$this->Form->input('typeaa', array('label'=>'L\'article commandé','options' => $stock,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='produits'>".$this->Form->input('typepp', array('label'=>'Le produit commandé','options' => $produit,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='services'>".$this->Form->input('typess', array('label'=>'La service commandé','options' => $service,'style'=>'width: 100%'))."</td></tr>";

echo "<tr><td></td><td>".$this->Form->input('qte',array('label' => 'Quantité','value'=>'1'))."</td></tr>";
echo "<tr><td>".$this->Form->input('tva2',array('label' => 'TVA2 %','value'=>'0'))."</td><td>";
echo $this->Form->input('frais',array('label' => 'Frais de dossier'))."</td></tr><tr><td>";
echo $this->Form->input('remise',array('label' => 'Remise %'))."</td><td>";
echo $this->Form->input('etat',array('label' => 'Statut','options'=>array('Réglée'=>'Réglée','Non réglée'=>'Non réglée')))."</td></tr><tr><td>";
//echo $this->Form->input('datee',array('label' => 'Emise le'));
echo "<tr><td>".$this->Form->input('dater',array('label' => 'Réglée le'))."</td></tr></table>";
echo $this->Form->input('infos',array('label' => 'Plus d\'informations'));
echo $this->Form->end('Ajouter');
?>
<script type="text/javascript">

	function OnSelectionChangeaa (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="Article du stock"){
				document.getElementById('stock').style.display="block";
				document.getElementById('produits').style.display="none";
				document.getElementById('services').style.display="none";
			}else if(selectedOption.value=="Produit du site"){
				document.getElementById('stock').style.display="none";
				document.getElementById('produits').style.display="block";
				document.getElementById('services').style.display="none";
			}else{
				document.getElementById('stock').style.display="none";
				document.getElementById('produits').style.display="none";
				document.getElementById('services').style.display="block";
			}
        }
	function OnSelectionChange (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="Bon de livraison"){
				document.getElementById('versf').style.display="block";
			}else {
				document.getElementById('versf').style.display="none";
			}
        }
	function OnSelectionChangea (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="Bon de réception"){
				document.getElementById('vers').style.display="block";
			}else {
				document.getElementById('vers').style.display="none";
			}
        }
	function OnSelectionChanget (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="Ventes"){
				document.getElementById('ventes').style.display="block";
				document.getElementById('achats').style.display="none";
			}else {
				document.getElementById('ventes').style.display="none";
				document.getElementById('achats').style.display="block";
			}
        }
    </script>
</div>