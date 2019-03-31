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
<th>Numéro</th>
<th>Nom</th>
<th>Prénom</th>
<th>Niveau (Note)</th>
<th>Remarques</th>
</tr>
<?php foreach($optionss as $user):
if(!empty($user['Employe']['noter'])){
?>
<tr>
<td><?php echo $user['Employe']['id'];?></td>
<td><?php echo $this->Html->link($user['Employe']['nom'],array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$remplacement='_')));?></td>
<td><?php echo $user['Employe']['prenom'];?></td>
<td><?php echo $user['Employe']['noter'];?></td>
<td><?php echo $user['Employe']['noterinfo'];?></td>
</tr>
<?php } endforeach; unset($option);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Employe']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
 </div>
 
 

<?php echo $this->Form->create('Employe');?>

<h1>Noter un Employe</h1>
		<div class="infosdemande" >
			<table style="width:100%">
				<tr>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe')); ?>
					</td>
					<td><?php echo $this->Form->input('nom', array('label'=>'L\'employe','options' => $options));?>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td><?php echo $this->Form->input('noter',array('label'=>'La Note','options'=>array('mauvais'=>'mauvais','moyenne'=>'moyenne','bien'=>'bien','excellent'=>'excellent')));?>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td><?php echo $this->Form->input('noterinfo',array('label'=>'Remarques (Max: 200 lettre)'));?>
					</td>
				</tr>
			</table>								
		</div>	
	<table>
				<tr>
					<td>
					<div class="demandesec">
						
					</div>
					</td>
					
					<td>
					<!--<a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="img/images/bouton_envoyer_gris.jpg" /></a>-->
					<?php echo $this->Form->end('Noter'); ?>
					</td>
				</tr>
	</table>	
</div>