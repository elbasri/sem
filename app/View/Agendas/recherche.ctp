<?php  if($test==0){?>
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
		<?php echo $this->Form->create('Agenda',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Date de fin de rendez-vous</td>
		</tr>
		
		<tr><td></td><td></td>
		<td><?php echo $this->Form->input('dated',array('label'=>'Entre','type'=>'date')); ?></td>
		<td><?php echo $this->Form->input('datef',array('label'=>'Et','type'=>'date')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Numéro de rendez-vous</td>
		</tr>
		
		<tr><td></td><td></td>
		<td><?php echo $this->Form->input('ide',array('label'=>'Recherche Par Numéro')); ?></td>
		<td><br><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>
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
	<h1>Resultat de recherche dans les rendez-vous :</h1>
	<table >
	<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Sujet</th>
<th>Titre</th>
<th>Contact</th>
<th>Date</th>
<th>Action</th>
	</tr>
	<?php $count=0; foreach($realisation	as $post): ?>
	<tr>
	<td><?php echo $post['Agenda']['id'];?></td>
	<td><?php echo $this->Html->link($post['Agenda']['ref'],array('controller'=>'agendas','action'=>'view',$post['Agenda']['id'],Inflector::slug($post['Agenda']['ref'],$replacement ='_')));?></td>
	<td><?php echo $post['Agenda']['typep'];?></td>
	<td><?php

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

	?></td>
	<td><?php echo $this->Html->link($post['Agenda']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Agenda']['client_id'],Inflector::slug($post['Agenda']['client_nom'],$replacement ='_')));?></td>
	<td><?php echo $post['Agenda']['date'];?></td>
	<td>
	<?php 
	echo $this->HTML->link('Modifier',array('controller'=>'agendas','action'=>'modifier',$post['Agenda']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'agendas','action'=>'supprimer',$post['Agenda']['id']));

	?>
	</td>
	</tr>
	<?php $count++; endforeach; unset($post);?>
	</table>
	<h2><?php if($count==0) echo "Aucun Resultat !";?></h2>
	<h2><a href="recherche" >Nouvelle Recherche</a></h2>
	</div>
<?php }?>