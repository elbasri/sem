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
		
			<table>
				<tr >
					<td style="width:35%">Type: <strong><?php echo $post['Stockaction']['nom'];?></strong>
					</td>
					
					<td style="width:35%">L'article: <strong><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Date: <strong><?php echo $post['Stockaction']['date'];?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Quantité: <strong><?php echo $post['Stockaction']['qte']." ";
						if($post['Stockaction']['type']=="2")
							echo "<strong>".$config['Configuration']['volume']."</strong>";
						else if($post['Stockaction']['type']=="3")
							echo "<strong>".$config['Configuration']['poids']."</strong>";?></strong>
					</td>
					
					<td style="width:35%">Taux: <strong><?php echo $post['Stockaction']['cout']." ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				<?php if($post['Stockaction']['nom']=='sortie'){?>
				<tr >
					<td style="width:35%">Destination: <strong><?php 
						if($post['Stockaction']['type']==1) echo $this->Html->link($post['Stockaction']['article_nom'],array('controller'=>'inventaires','action'=>'view',$post['Stockaction']['article_id'],Inflector::slug($post['Stockaction']['article_nom'],$replacement ='_')));
						else if($post['Stockaction']['type']==2) echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));
						else
							echo "Indéfinie";

						?></strong>
					</td>
					
					<td style="width:35%">Plus d'Infos: <strong><?php if($post['Stockaction']['valeurtxt']!="")echo $post['Stockaction']['valeurtxt'].": ".$post['Stockaction']['valeur']; else echo "aucun";?></strong>
					</td>
				</tr>
				<?php }?>
			</table>			
<br><h2>Raison de l'opération:</h2> 
<?php if($post['Stockaction']['raison']!="")echo $post['Stockaction']['raison']; else echo "Indéfinie";?>
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>stockactions/modifier/<?php echo $post['Stockaction']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>stockactions/imprimer/<?php echo $post['Stockaction']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>stockactions/imprimer/<?php echo $post['Stockaction']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>