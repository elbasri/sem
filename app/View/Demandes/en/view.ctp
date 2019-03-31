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
 <?php echo $this->element('menudetails',array('type'=>'demandes')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
		<div class="infosdemande" >
		
			<table >	

				<tr >
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image')); ?>
					</td>
					<td width="350">Name: <strong><?php echo $post['Demande']['nom'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Email: <strong><?php echo $post['Demande']['email'];?></strong>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Company: <strong><?php echo $post['Demande']['societe'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Phone: <strong><?php echo $post['Demande']['tel'];?></strong>
					</td>
				</tr>
				
				<tr>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Titre: <br><strong><?php echo $post['Demande']['titre'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Details: <br><strong><?php echo $post['Demande']['details'];?></strong>
					</td>
					
				</tr>
				<!--<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><strong><?php echo $this->HTML->link('Répondre',array('controller'=>'demandes','action'=>'repond',$post['Demande']['id']),array('style'=>'font-size:20px;color:green'));?></strong>
					</td>
					
					
				</tr>-->
			</table>								
		</div>	


</div>