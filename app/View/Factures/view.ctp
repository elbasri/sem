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
$titre=$post['Facture']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:70%">
					<table>
						<tr><td>Destination: <strong><?php echo $this->Html->link($post['Facture']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Facture']['client_id'],Inflector::slug($post['Facture']['client_nom'],$replacement ='_')));?></strong></td></tr>
						<tr><td>Demandeur: <strong></strong></td></tr>
					</table>
					</td>
					
					<td style="width:30%">
					<table>
						<tr><td>Référence </td><td><?php echo $post['Facture']['id'];?></td></tr>
						<tr><td>Date </td><td><?php echo $post['Facture']['created'];?></td></tr>
					</table>
					</td>
					
				</tr>
			</table>	
<br>
<?php if($post['Facture']['infos']!="") echo $post['Facture']['infos'];?>
<br>
<div align="center" class="affichago">
<?php /*if($post['Commande']['type']=="A envoyer"){?><p ><strong style="font-size:30px">Demande De Prix</strong><br>Demande de réduction d'environ <?php echo $post['Commande']['remise'];?>%</p><?php } else{ ?><p style="font-size:30px"><strong>Arrivage des commandes</strong></p><?php } */?>
<?php  $count=0; if(isset($items) && $items){?>
<table>
<tr>
<th style="width:10%">Référence</th>
<th style="width:50%">Désignation</th>
<th style="width:10%">Quantité</th>
<th style="width:20%">Date de livraison</th>
<th style="width:10%">Action</th>
</tr>
<?php foreach($items as $item): $count++;?>
<tr>
<td style="height:40px"><?php if($item['Item']['ref']!=null) echo $item['Item']['ref']; else echo "___"?></td>
<td style="text-align:left"><?php
$item['Item']['desc']=strpos($item['Item']['desc'], " - ") ? substr($item['Item']['desc'], 0, strpos($item['Item']['desc'], " - ")) : $item['Item']['desc'];
echo $item['Item']['desc'];?></td>
<td>
<?php echo $item['Item']['qte']." ";
						if($item['Item']['typevaleur']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($item['Item']['typevaleur']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?>
</td>
<td><?php echo $item['Item']['date'];?></td>
<td><a href="<?=$this->Html->url('/')?>factures/modifier/<?php echo $item['Item']['idaction']?>/s/<?php echo $post['Facture']['id'];?>" >Supprimer</a></td>
</tr>
<?php endforeach; unset($item);?>
</table>
<?php }
if($count==0)
	echo "<h2>Aucun éléments à afficher</h2>";
 //echo $post['Facture']['facture'];
 ?></div>
<br/>
			

<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>factures/modifier/<?php echo $post['Facture']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>factures/imprimer/<?php echo $post['Facture']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>factures/imprimer/<?php echo $post['Facture']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>
