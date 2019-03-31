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

<?php echo $this->Form->create('Client');?>


		<div class="infosdemande" >
<h1><?php
/*if($this->Session->read('typecrm')=='f')
	echo 'Add un fournisseur';
else if($this->Session->read('typecrm')=='fa')
	echo 'Add un fabricant';
else if($this->Session->read('typecrm')=='sm')
	echo 'Add une société de maintenance';
else if($this->Session->read('typecrm')=='sa')
	echo 'Add une société d\'assurance';
else if($this->Session->read('typecrm')=='sl')
	echo 'Add une société de location';
else
	echo 'Add un client';
	*/
?>	</h1>	
			<table >
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('ref',array('id'=>'nom','placeholder'=>'Reference'));?>
					</td>
					
					<td> </td>
					<td> 
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('nom',array('id'=>'nom','placeholder'=>'Nom de Company','label'=>'Nom de l\'établissement'));?>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Le Prénom','title'=>''));?></td>
					<td><?php echo $this->Form->input('prenom',array('id'=>'prenom','placeholder'=>'Nom de contact','label'=>'Le nom et Prénom'));
					?>
					</td>
					
				</tr>
				
				<tr>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('civilite',array('label'=>'Civility','options'=>array('Mr'=>'Mr','Mme'=>'Mrs','Mlle'=>'Ms')));?>
					</td>
					
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Phone number','label'=>'Le Phone'));
					?>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('pays',array('id'=>'pays','placeholder'=>'Pays','label'=>'Le Pays'));
					?></td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('ville',array('id'=>'Ville','placeholder'=>'la Ville'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('codep',array('id'=>'codep','label'=>'Postcode','placeholder'=>'Le Postcode'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('adressepostale',array('id'=>'adressepostale','placeholder'=>'L\'adresse postale','label'=>'L\'adresse'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'codep','label'=>'Email','placeholder'=>'L\'email officiel'));
					?>
					</td>
				</tr>
			</table>								
		</div>	
	<table>
				<tr>
					<td>
					<div class="demandesec">
						<h3>Les champs avec l'étoil (<font color="red">*</font>) sont obligatoire</h3>
					</div>
					</td>
					
					<td>
					<!--<a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="img/images/bouton_envoyer_gris.jpg" /></a>-->
					
<?php echo $this->Form->end('Add'); ?>
					</td>
				</tr>
	</table>	
</div>