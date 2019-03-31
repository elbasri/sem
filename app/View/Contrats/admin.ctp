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
<table >
<tr>
<th>Numéro</th>
<th>Libellé</th>
<th>Type</th>
<th>Date d'expiration</th>
<th>État actuel</th>
<th>La société</th>
<th>Action</th>
</tr>
<?php 
$count=0; $exp=0; $enc=0; $cg=0; $cm=0; $ca=0; $cl=0;
foreach($post as $post): 
$count++;
if($post['Contrat']['type']=="Garantie")
	$cg++;
if($post['Contrat']['type']=="Maintenance")
	$cm++;
if($post['Contrat']['type']=="Assurance")
	$ca++;
if($post['Contrat']['type']=="Location")
	$cl++;
?>
<tr>
<td><?php echo $post['Contrat']['id'];?></td>
<td><?php echo $this->Html->link($post['Contrat']['nom'],array('controller'=>'Contrats','action'=>'view',$post['Contrat']['id'],Inflector::slug($post['Contrat']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Contrat']['type'];?></td>
<td><?php echo $post['Contrat']['datef'];?></td>
<td><?php if(date('Y-m-d')>$post['Contrat']['datef']){ echo "<font color='red'>Contrat expiré</font>"; $exp++; }else{ echo "<font color='green'>Contrat valide</font>"; $enc++; }?></td>
<td><?php echo $this->Html->link($post['Contrat']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Contrat']['client_id'],Inflector::slug($post['Contrat']['client_nom'],$replacement ='_')));?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'Contrats','action'=>'modifier',$post['Contrat']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'Contrats','action'=>'supprimer',$post['Contrat']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Expirés</th>
		<th>Valides</th>
		<th>Garantie</th>
		<th>Maintenance</th>
		<th>Assurance</th>
		<th>Location</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $exp;?></td>
		<td><?php echo $enc;?></td>
		<td><?php echo $cg;?></td>
		<td><?php echo $cm;?></td>
		<td><?php echo $ca;?></td>
		<td><?php echo $cl;?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Contrat']['count']>10){
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
		<a href="<?=$this->Html->url('/contrats/t')?>" class="mega-link btn widthcent2"><font class="widthcent3">Contrats expirés</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/e')?>" class="mega-link btn widthcent2"><font class="widthcent3">Contrats valides</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les contrats</font></a>
		</li>
	</ul>
	</div>
</div>
<div  align="center" class="menufooter">
	<div style="display:inline-block; " >
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">C. Garantie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/contratm')?>" class="mega-link btn widthcent2"><font class="widthcent3">C. Maintenance</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/contrata')?>" class="mega-link btn widthcent2"><font class="widthcent3">C. Assurance</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/contratl')?>" class="mega-link btn widthcent2"><font class="widthcent3">C. Location</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/contrats/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>