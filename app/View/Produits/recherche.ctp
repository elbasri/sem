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
 <?php echo $this->element('menudetails',array('type'=>'produits')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>  
		<?php echo $this->Form->create('Produit',array('action'=>'recherche'));?>
		<table style="width:100%">
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Mot Clé</td>
		</tr>
		
		<tr>
		<td></td>
		<td><?php echo $this->Form->input('titree',array('label'=>'Mot Clé')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Prix</td>
		</tr>
		
		<tr>
		<td></td>
		<td><?php echo $this->Form->input('prix1',array('label'=>'Entre')); ?></td>
		<td><?php echo $this->Form->input('prix2',array('label'=>'Et')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="3" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Etat</td>
		</tr>
		
		<tr><td></td>
		<td><?php echo $this->Form->input('etat',array('label'=>'Etat','options'=>array('1'=>'Publier','0'=>'Brouillon'))); ?></td>
		</tr>
		
		<tr> 
		<td>
		<td><br><?php echo $this->Form->end('Lancer un recherche');?></td></td>
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
 <?php echo $this->element('menudetails',array('type'=>'produits')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
	<table>
	<tr>
	<th>ID</th>
	<th>Libellé</th>
	<th>Prix</th>
	<th>Etat</th>
	<th>Date de création</th>
	<th>Action</th>
	</tr>
	<?php $count=0; foreach($employe as $user):?>
	<tr>
	<td><?php echo $user['Produit']['id'];?></td>
	<td><?php echo $this->Html->link($user['Produit']['titre'],array('controller'=>'produits','action'=>'view',$user['Produit']['id'],Inflector::slug($user['Produit']['titre'],$remplacement='_')));?></td>
	<td><?php echo $user['Produit']['prix'];?></td>
	<td><?php if($user['Produit']['etat']=="1") echo "<font color='green'>Publier</font>"; else echo "<font color='red'>Brouillon</font>";?></td>
	<td>
	<td><?php echo $user['Produit']['created'];?></td>
	<?php 
	echo $this->HTML->link('Modifier',array('controller'=>'produits','action'=>'modifier',$user['Produit']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'produits','action'=>'supprimer',$user['Produit']['id']));

	?>
	</td>
	</tr>
	<?php $count++; endforeach; unset($users);?>
	</table>
	 <h2><?php if($count==0) echo "Aucun Resultat !";?></h2>
	 <h2><a href="recherche" >Nouvelle Recherche</a></h2>
	 </div>
<?php }?>