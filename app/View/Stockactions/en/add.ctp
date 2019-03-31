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
<?php
echo $this->Form->create('Stockaction');
echo $this->Form->input('materiel_id', array('label'=>'L\'article','options' => $options,'style'=>'width: 100%'));
echo $this->Form->input('nom',array('label' => 'Type de l\'opération','options'=>array('entrée'=>'entrée','sortie'=>'sortie'),'onchange'=>'OnSelectionChange (this)'));
?>
<table>
<tr style="display:none" id="vers"><td style="width:50%"><?php echo $this->Form->input('type', array('legend'=>'Destination','required'=>'','type'=>'radio','options'=>array('1'=>'Biens','2'=>'Clients')));?></td>
	
	<td>
	<?php echo $this->Form->input('article_id', array('label'=>'Le bien','options' => $optiona,'style'=>'width: 100%'));?>
	<?php echo $this->Form->input('client_id', array('label'=>'Le Client','options' => $optionc,'style'=>'width: 100%'));?>
	<font color="red">Infos personnalisés:</font>
		<table>
			<tr>
				<td><?php echo $this->Form->input('valeur',array('label' => 'Valeur','value'=>'0'));?></td>
				<td><?php echo $this->Form->input('valeurtxt',array('label' => 'Désignation','value'=>'kilométrage'));?></td>
			</tr>
		</table>
	</td>
</tr>
<tr><td style="width:50%"><?php echo $this->Form->input('typevaleur', array('legend'=>'Type','required'=>'','type'=>'radio','options'=>array('1'=>'Quantité','2'=>'Volume','3'=>'Poids')));?></td>
	
	<td>
	<?php echo $this->Form->input('qte',array('label' => 'Valeur')); ?>
	</td>
</tr>
</table>

<?php
echo $this->Form->input('date',array('label' => 'Date'));
echo $this->Form->input('raison',array('label' => 'Raison'));
echo $this->Form->end('Add');
?>
<script type="text/javascript">
    function validate() {
        if (document.getElementById('destination').checked) {
            document.getElementById('vers').style.display="block";
        } else {
            document.getElementById('vers').style.display="none";
        }
    }
	function OnSelectionChange (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="sortie"){
				document.getElementById('vers').style.display="block";
			}else {
            document.getElementById('vers').style.display="none";
			}
        }
    </script>
</div>