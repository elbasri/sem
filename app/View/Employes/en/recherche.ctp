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
 <?php echo $this->element('menudetails',array('type'=>'employes')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
		<?php echo $this->Form->create('Employe',array('action'=>'recherche'));?>
		<table style="width:100%">
		
		<tr>
		<td><input name="rechercher" value="5" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Number of employees</td>
		</tr>
		
		<tr>
		<td></td>
		<td><?php echo $this->Form->input('ide',array('label'=>'ID')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Search by name</td>
		</tr>
		
		<tr>
		<td></td>
		<td><?php echo $this->Form->input('nom1',array('label'=>'Nom')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par prénom</td>
		</tr>
		
		<tr>
		<td></td> 
		<td><?php echo $this->Form->input('nom2',array('label'=>'Prénom')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="3" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par CIN</td>
		</tr>
		
		<tr><td></td> 
		<td><?php echo $this->Form->input('cine',array('label'=>'CIN')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="4" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Spécialité</td>
		</tr>
		
		<tr><td></td> 
		<td><?php echo $this->Form->input('specialite_id', array('label'=>'spécialité','options' => $options,'style'=>'width: 100%')); ?></td>
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
 <?php echo $this->element('menudetails',array('type'=>'employes')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
	<table>
	<tr>
<th>ID</th>
<th>Name</th>
<th>Prénom</th>
<th>Spécialité</th>
<th>Start date du contrat</th>
<th>End date du contrat</th>
<th>Date d'expiration CIN</th>
<th>Action</th>
	</tr>
	<?php $count=0; foreach($employe as $user):?>
	<tr>
	<td><?php echo $user['Employe']['id'];?></td>
	<td><?php echo $this->Html->link($user['Employe']['nom'],array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$remplacement='_')));?></td>
	<td><?php echo $user['Employe']['prenom'];?></td>
	<td><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></td>
	<td><?php echo $user['Employe']['datetravail'];?></td>
	<td><?php echo $user['Employe']['datefintravail']; if(date('Y-m-d')>$user['Employe']['datefintravail']) echo "<br><font color='red'>Contrat expiré</font>";?></td>
	<td><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']) echo "<br><font color='red'>CIN expiré</font>";?></td>
	<td>
	<?php 
	echo $this->Html->link('Edit',array('controller'=>'employes','action'=>'edit',$user['Employe']['id'])).'&nbsp;&nbsp; ';
	echo $this->Form->postLink('Delete',array('controller'=>'employes','action'=>'delete',$user['Employe']['id']));
	?>
	</td>
	</tr>
	<?php $count++; endforeach; unset($users);?>
	</table>
	 <h2><?php if($count==0) echo "No Result!";?></h2>
	 <h2><a href="recherche" >New Search</a></h2>	

	 </div>
<?php }?>