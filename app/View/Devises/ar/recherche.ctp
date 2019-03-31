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
 <?php echo $this->element('menudetails',array('type'=>'compta')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
		<?php echo $this->Form->create('Devise',array('action'=>'recherche'));?>
		<table style="width:100%">
		
		<tr>
		<td><input name="rechercher" value="3" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Référence du Devis</td>
		</tr>
		
		<tr>
		<td></td><td></td>
		<td><?php echo $this->Form->input('ref',array('label'=>'Référence')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par intitulé du Devis</td>
		</tr>
		
		<tr>
		<td></td><td></td>
		<td><?php echo $this->Form->input('nom1',array('label'=>'Intitulé')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="4" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par etat du Devis</td>
		</tr>
		
		<tr>
		<td></td><td></td>
		<td><?php echo $this->Form->input('et',array('label' => 'Etat du devis','options'=>array('Sans réponse - en attente'=>'Sans réponse - en attente','Accepté'=>'Accepté','Refusé'=>'Refusé'))); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Montant du Devis</td>
		</tr>
		
		<tr><td></td><td></td>
		<td><?php echo $this->Form->input('mont',array('label'=>'Montant')); ?></td>
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
 <?php echo $this->element('menudetails',array('type'=>'comptat')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
	<h1>Resultat de recherche dans les Devises :</h1>
	<table >
		<tr>
		<th>Numéro</th>
		<th>Référence</th>
		<th>Intitulé</th>
		<th>Date</th>
		<th>Client</th>
		<th>Type</th>
		<th>Montant</th>
		<th>Etat</th>
		<th>Action</th>
		</tr>
		<?php $count=0; foreach($realisation as $post): ?>
		<tr>
		<td><?php echo $post['Devise']['id'];?></td>
		<td><?php echo $post['Devise']['reference'];?></td>
		<td><?php echo $this->Html->link($post['Devise']['nom'],array('controller'=>'devises','action'=>'view',$post['Devise']['id'],Inflector::slug($post['Devise']['nom'],$replacement ='_')));?></td>
		<td><?php echo $post['Devise']['ladate'];?></td>
		<td><?php echo $this->Html->link($post['Devise']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Devise']['client_id'],Inflector::slug($post['Devise']['client_nom'],$replacement ='_')));?></td>
		<td><?php echo $post['Devise']['type'];?></td>
		<td><?php echo $post['Devise']['montant']." ".$post['Devise']['devise'];?></td>
		<td><?php echo $post['Devise']['etat'];?></td>
		<td>
		<?php 
		echo $this->HTML->link('Modifier',array('controller'=>'devises','action'=>'modifier',$post['Devise']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'devises','action'=>'supprimer',$post['Devise']['id']));

		?>
		</td>
		</tr>
		<?php endforeach; unset($post);?>
	</table>
	<h2><?php if($count==0) echo "Aucun Resultat !";?></h2>
	<h2><a href="recherche" >Nouvelle Recherche</a></h2>
	</div>
<?php }?>