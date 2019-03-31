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
 <?php echo $this->element('menudetails',array('type'=>'users')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
		<?php echo $this->Form->create('User',array('action'=>'recherche'));?>
		<table style="width:100%">
		
		<tr>
		<td><input name="rechercher" value="5" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Numéro d'utilisateur</td>
		</tr>
		
		<tr>
		<td></td>
		<td><?php echo $this->Form->input('ide',array('label'=>'Numéro')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par nom</td>
		</tr>
		
		<tr>
		<td></td>
		<td><?php echo $this->Form->input('nom1',array('label'=>'Nom')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par email</td>
		</tr>
		
		<tr>
		<td></td> 
		<td><?php echo $this->Form->input('nom2',array('label'=>'Email')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="4" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Type d'utilisateur</td>
		</tr>
		
		<tr><td></td> 
		<td><?php echo $this->Form->input('specialite',array('label'=>'Type')); ?></td>
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
 <?php echo $this->element('menudetails',array('type'=>'users')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
	<table>
	<tr>
	<th>Numéro</th>
	<th>Nom</th>
	<th>Email</th>
	<th>Tél</th>
	<th>Type</th>
	<th>Statut</th>
	<th>Action</th>
	</tr>
	<?php $count=0; foreach($employe as $user):?>
	<tr>
	<td><?php echo $user['User']['id'];?></td>
	<td><?php echo $this->Html->link($user['User']['nom'],array('controller'=>'users','action'=>'view',$user['User']['id'],Inflector::slug($user['User']['nom'],$remplacement='_')));?></td>
	<td><?php echo $user['User']['email'];?></td>
	<td><?php echo $user['User']['tel'];?></td>
	<td><?php 
	if($user['User']['id']==1)
		echo '<font color=\'red\'>Super Admin</font>';
	else if($user['User']['role']=='admin')
		echo '<font color=\'red\'>'.$user['User']['role'].'</font>';
	else if($user['User']['role']=='moderateur')
		echo '<font color=\'#0000FF\'>'.$user['User']['role'].'</font>';
	else
		echo '<font color=\'green\'>'.$user['User']['role'].'</font>';
	?></td>
	<td><?php 
	if($user['User']['etat']==0)
		echo '<p style=\'color:red\'>Innactif</p>';
	else
		echo '<p style=\'color:green\'>Actif</p>';
	?></td>
	<td>

	<?php 
	echo $this->Html->link('Modifier',array('controller'=>'users','action'=>'edit',$user['User']['id'])).'&nbsp;&nbsp; ';
	echo $this->Form->postLink('Supprimer',array('controller'=>'users','action'=>'delete',$user['User']['id']));
	?>
	</td>
	</tr>
	<?php $count++; endforeach; unset($users);?>
	</table>
	 <h2><?php if($count==0) echo "Aucun Resultat !";?></h2>
	 <h2><a href="recherche" >Nouvelle Recherche</a></h2>
	 </div>
<?php }?>