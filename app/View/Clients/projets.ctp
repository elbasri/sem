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

<table>
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>Coût</th>
<th>Debut</th>
<th>Fin</th>
<th>Societé</th>
<th>Contact</th>
<th>Tél</th>
</tr>
<?php foreach($projets as $prj):
foreach($users as $user):
if($prj['Projet']['client_id']==$user['Client']['id']){
$nom=$this->Html->link($user['Client']['nom'],array('controller'=>'clients','action'=>'view',$user['Client']['id'],Inflector::slug($user['Client']['nom'],$remplacement='_')));
$prenom=$user['Client']['prenom'];
$tel=$user['Client']['tel'];
}
endforeach; unset($user);
?>
<tr>
<td><?php echo $prj['Projet']['id'];?></td>
<td><?php echo $prj['Projet']['ref'];?></td>
<td><?php echo $this->Html->link($prj['Projet']['nom'],array('controller'=>'projets','action'=>'view',$prj['Projet']['id'],Inflector::slug($prj['Projet']['nom'],$remplacement='_')));?></td>
<td><?php echo $prj['Projet']['cout'];?></td>
<td><?php echo $prj['Projet']['dated'];?></td>
<td><?php echo $prj['Projet']['datef'];?></td>
<td><?php echo $nom;?></td>
<td><?php echo $prenom;?></td>
<td><?php echo $tel;?></td>
</tr>
<?php endforeach; unset($prj);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Client']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
 </div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/projets/lier')?>" class="mega-link btn widthcent2"><font class="widthcent3">Projet => clients</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/clients/imprimerlisteprojets')?>" class="mega-link btn widthcent2"><font class="widthcent3">Imprimer</font></a>
		</li>
	</ul>
	</div>
</div>
 </div>
