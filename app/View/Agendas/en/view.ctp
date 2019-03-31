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
$titre=$post['Agenda']['projet_nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Agenda']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Date: <strong><?php echo $post['Agenda']['date'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Sujet: <strong><?php echo $post['Agenda']['typep'];?></strong>
					</td>
					
					<td style="width:35%">Titre: <strong><?php 
					if($post['Agenda']['typep']=="Article du stock")
						echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'materiels','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
					else if($post['Agenda']['typep']=="Produit du site web")
						echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'produits','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
					else if($post['Agenda']['typep']=="Service du site web")
						echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'services','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
					else if($post['Agenda']['typep']=="Devis")
						echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'devises','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
					else if($post['Agenda']['typep']=="Commande")
						echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'commandes','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
					else if($post['Agenda']['typep']=="Facture")
						echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'factures','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
					else if($post['Agenda']['typep']=="Autre")
						echo $post['Agenda']['projet_nom'];
					?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Contact: <strong><?php echo $this->Html->link($post['Agenda']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Agenda']['client_id'],Inflector::slug($post['Agenda']['client_nom'],$replacement ='_')));?></strong>
					</td>
					
					<td style="width:35%">
					</td>
				</tr>
				<tr >
					<td style="width:35%">Début: <strong><?php echo $post['Agenda']['dated'];?></strong>
					</td>
					
					<td style="width:35%">Fin: <strong><?php echo $post['Agenda']['datef'];?></strong>
					</td>
				</tr>
			</table>
			
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>agendas/modifier/<?php echo $post['Agenda']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>agendas/imprimer/<?php echo $post['Agenda']['id']?>" target="_blank"target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>agendas/imprimer/<?php echo $post['Agenda']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>