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

<?php echo $this->Form->create('Employe');?>


		<div class="infosdemande" >
		
			<table >	
			
				<tr>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('img',array('label'=>'Photo','id'=>'SliderPhoto','placeholder'=>'cliquez sur selectionner'));?>
					</td>
					<td>
					</td>
					<td><br><br><h3><a href="#" onclick="openFileBrowserSliderPhoto(); return false;" >Selectionner</a></h3>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => '','title'=>'','width'=>'20')); ?>
					</td>
					<td><?php echo $this->Form->input('contrat',array('label'=>'Contrat','id'=>'SliderFile','placeholder'=>'cliquez sur selectionner'));?>
					</td>
					<td>
					</td>
					<td><br><br><h3><a href="#" onclick="openFileBrowserSliderFile(); return false;" >Selectionner</a></h3>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('nom',array('id'=>'nom','placeholder'=>'Le Nom de l\'employe'));?>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('prenom',array('id'=>'prenom','placeholder'=>'Le Prénom de l\'employe','label'=>'Le Prénom'));
					?>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('cin',array('id'=>'cin','placeholder'=>'Le Code d\'identité national','label'=>'CIN'));?>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('cinend',array('id'=>'cinend','label'=>'Date d\'expiration de CIN'));
					?>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'')); ?>
					</td>
					<td><?php echo $this->Form->input('civilite',array('label'=>'Civilité','options'=>array('Mr'=>'Mr','Mme'=>'Mme','Mlle'=>'Mlle')));?>
					</td>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('datenaissance',array('id'=>'datenaissance','placeholder'=>'Date de Naissance de l\'employe','label'=>'Date de Naissance','minYear' => date('Y') - 70));
					?></td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'email','placeholder'=>'(optionnel)','label'=>'Adresse mail'));
					?></td>
					
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Numéro de Téléphone','label'=>'Le Téléphone'));
					?>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('pays',array('id'=>'pays','placeholder'=>'Le Pays ou la Nationalité de l\'employe','label'=>'Le Pays/Nationalité'));
					?></td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('ville',array('id'=>'Ville','placeholder'=>'la Ville'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('codep',array('id'=>'codep','label'=>'Code Postale','placeholder'=>'Le Code Postale'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('adressepostale',array('id'=>'adressepostale','placeholder'=>'L\'adresse postale de l\'employe','label'=>'L\'adresse'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('datetravail',array('id'=>'datetravail','placeholder'=>'Date de début du contrat','label'=>'Date de début du contrat','minYear' => date('Y') - 70));
					?></td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('datefintravail',array('id'=>'datefintravail','placeholder'=>'Date de Date de fin du contrat','label'=>'Date de Date de fin du contrat','minYear' => date('Y') - 70));
					?></td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('specialite_id', array('label'=>'La spécialité','options' => $options,'style'=>'width: 100%'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>''));?></td>
					<td><?php echo $this->Form->input('salaire',array('id'=>'salaire','placeholder'=>'Le salaire de l\'employe','label'=>'Le salaire'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('icons/lock.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td><?php echo $this->Form->input('cnss', array('label'=>'N° de sécurité sociale','style'=>'width: 100%'));
					?>
					</td>
					<td><?php echo $this->Html->image('icons/lock.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td><?php echo $this->Form->input('matricule',array('id'=>'salaire','label'=>'Matricule'));?>
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
					
<?php echo $this->Form->input('id',array('type' => 'hidden'));
 echo $this->Form->end('Modifier'); ?>
					</td>
				</tr>
	</table>	
</div>
