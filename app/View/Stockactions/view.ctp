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
$titre=$post['Stockaction']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
			<table >
				<tr>
					<td style="width:70%">
					<table>
						<?php if($post['Stockaction']['nom']=="sortie"){ ?>
						<tr><td>Destination: <strong><?php echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));?></strong></td></tr>
						<tr><td>Demandeur: <strong></strong></td></tr>
						<?php } ?>
					</table>
					</td>
					
					<td style="width:30%">
					<table>
						<tr><td>Référence </td><td><?php echo $post['Stockaction']['id'];?></td></tr>
						<tr><td>Date </td><td><?php echo $post['Stockaction']['date'];?></td></tr>
					</table>
					</td>
					
				</tr>
			</table>
<br>
<div align="center" class="affichago">
<table >
<tr>
<th style="width:10%">Référence</th>
<th style="width:50%">Désignation</th>
<th style="width:10%">Quantité</th>
<th style="width:40%">Observation</th>
</tr>
<tr>
<td style="height:40px; text-align:left"><?php if($post['Stockaction']['ref']!=null) echo $post['Stockaction']['ref']; else echo "___"?></td>
<td style="height:40px; text-align:left"><?php
$post['Stockaction']['materiel_nom']=strpos($post['Stockaction']['materiel_nom'], " - ") ? substr($post['Stockaction']['materiel_nom'], 0, strpos($post['Stockaction']['materiel_nom'], " - ")) : $post['Stockaction']['materiel_nom'];
echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Stockaction']['qte']." ";
						if($post['Stockaction']['typevaleur']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($post['Stockaction']['typevaleur']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>
<td></td>
</tr>

</table>
</div>
 						


<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>stockactions/modifier/<?php echo $post['Stockaction']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>stockactions/imprimer/<?php echo $post['Stockaction']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>stockactions/imprimer/<?php echo $post['Stockaction']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>
