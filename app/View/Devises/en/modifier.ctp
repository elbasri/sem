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
echo $this->Form->create('Devise');
echo "<table><tr><td>";
echo $this->Form->input('client_id', array('label'=>'Le Client','options' => $options,'style'=>'width: 100%'))."</td><td>";
echo $this->Form->input('ladate',array('label' => 'Date'))."</td></tr><tr><td>";
echo $this->Form->input('nom',array('label' => 'Intitulé du devis'))."</td><td>";
echo $this->Form->input('reference',array('label' => 'Reference'))."</td></tr><tr><td>";
echo $this->Form->input('devise',array('label' => 'Devise'))."</td><td>";
echo $this->Form->input('tva1',array('label' => 'TVA1 %'))."</td></tr>";

echo "<tr><td>".$this->Form->input('typedevis',array('label' => 'Type de construction d\'éléments','options'=>array('Standard'=>'Standard','Libre'=>'Constructeur libre',),'onchange'=>'OnSelectionChangesl (this)'))."</td><td></td></tr>";

echo "</table><div id='Standard'><table>";
echo "<tr ><td>".$this->Form->input('typearticle',array('label' => 'Type d\'article','options'=>array('Article du stock'=>'Article du stock','Produit du site'=>'Produit du site','Service du site'=>'Service du site'),'onchange'=>'OnSelectionChangea (this)'))."</td>";
echo "<td id='stock'>".$this->Form->input('typea', array('label'=>'L\'article commandé','options' => $stock,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='produits'>".$this->Form->input('typep', array('label'=>'Le produit commandé','options' => $produit,'style'=>'width: 100%'))."</td>";
echo "<td style='display:none' id='services'>".$this->Form->input('types', array('label'=>'La service commandé','options' => $service,'style'=>'width: 100%'))."</td></tr>";
echo "<tr><td>.".$this->Form->input('delete',array('label' => 'Supprimer les anciens éléments','type'=>'checkbox'))."</td><td>";
echo $this->Form->input('qte',array('label' => 'Quantité'))."</td></tr>";
echo "</table></div><table>";
echo "<div id='Libre' style='display:none'>";
$devis='<table align="center"  cellpadding="1" cellspacing="1" height="112" width="409"><thead><tr><th scope="col"><strong>QTE</strong></th><th scope="col"><strong>Libellé</strong></th><th scope="col"><strong>Description</strong></th><th scope="col">Prix Unitaire</th><th scope="col">Total</th></tr></thead><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p>&nbsp;</p>';
echo $this->Form->input('devis',array('label' => 'Détails du devis'));
echo $this->Form->input('montant',array('label' => 'Montant TTC'));

echo "</div><table>";

echo "<tr><td>".$this->Form->input('type',array('label' => 'Type','options'=>array('Devis'=>'Devis','Devis estimatif'=>'Devis estimatif')))."</td><td>";
echo $this->Form->input('tva2',array('label' => 'TVA2 %'))."</td></tr><tr><td>";
echo $this->Form->input('frais',array('label' => 'Frais de dossier'))."</td><td>";
echo $this->Form->input('remise',array('label' => 'Remise %'))."</td></tr><tr><td>";
echo $this->Form->input('etat',array('label' => 'Statut du devis','options'=>array('Sans réponse - en attente'=>'Sans réponse - en attente','Accepté'=>'Accepté','Refusé'=>'Refusé')))."</td></tr>";
echo "</table>";
echo $this->Form->input('infos',array('label' => 'Plus d\'informations'));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Edit');
?>
<script type="text/javascript">

	function OnSelectionChangesl (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="Standard"){
				document.getElementById('Standard').style.display="block";
				document.getElementById('Libre').style.display="none";
			}else {
				document.getElementById('Standard').style.display="none";
				document.getElementById('Libre').style.display="block";
			}
        }
	function OnSelectionChangea (select) {
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

    </script>
</div>



