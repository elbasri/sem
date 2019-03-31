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
<?php 
$titre=$user['User']['username'];
$this->element('meta',array('titre'=>$titre));
?>
<table>
<tr>
<th>ID</th>
<th>Username</th>
<th>Password</th>
<th>Action</th>
</tr>
<tr>
<td><?php echo $user['User']['id'];?></td>
<td><?php echo $user['User']['username'];?></td>
<td width="300">{************}</td>
<td><strong>
<?php 
echo $this->Html->link('Edit profile',array('controller'=>'users','action'=>'edit',$user['User']['id']));
?></strong>
</td>
</tr>
</table>

		<div class="infosdemande" >
		
			<table >	

				<tr >
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td width="350">Civility: <strong><?php echo $user['User']['civilite'];?></strong>
					</td>
					
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td width="350">Name: <strong><?php echo $user['User']['nom'];?></strong>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>email: <strong><?php echo $user['User']['email'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Phone: <strong><?php echo $user['User']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>CSocially: <strong><?php echo $user['User']['societe'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Country: <strong><?php echo $user['User']['pays'];?></strong>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>City: <strong><?php echo $user['User']['ville'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Postcode: <strong><?php echo $user['User']['codep'];?></strong>
					</td>
					
					
				</tr>
			</table>								
		</div>	
		
</div>