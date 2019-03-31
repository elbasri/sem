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
<th>Référence</th>
<th>Sujet</th>
<th>Titre</th>
<th>Contact</th>
<th>Date</th>
<th>Action</th>
</tr>
<?php 
$count=0; $exp=0; $enc=0;
foreach($post as $post): 
$count++;
if(date('Y-m-d')<$post['Agenda']['date'])
	$enc++;
if(date('Y-m-d')>$post['Agenda']['date'])
	$exp++;
?>
<tr>
<td><?php echo $post['Agenda']['id'];?></td>
<td><?php echo $this->Html->link($post['Agenda']['ref'],array('controller'=>'agendas','action'=>'view',$post['Agenda']['id'],Inflector::slug($post['Agenda']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Agenda']['typep'];?></td>
<td><?php

if($post['Agenda']['typep']=="Article du stock")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'materiels','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Produit du site web")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'produits','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Service du site web")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'services','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Devis")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'devises','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Commande")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'commandes','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Facture")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'factures','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Autre")
	echo $post['Agenda']['projet_nom'];

?></td>
<td><?php echo $this->Html->link($post['Agenda']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Agenda']['client_id'],Inflector::slug($post['Agenda']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Agenda']['date'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'agendas','action'=>'modifier',$post['Agenda']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'agendas','action'=>'supprimer',$post['Agenda']['id']));
?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre de rendez-vous</th>
		<th>Términés</th>
		<th>A venir</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $exp;?></td>
		<td><?php echo $enc;?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Agenda']['count']>10){
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
		<a href="<?=$this->Html->url('/agendas/t')?>" class="mega-link btn widthcent2"><font class="widthcent3">Términés</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/a')?>" class="mega-link btn widthcent2"><font class="widthcent3">A venir</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tous les rendez-vous</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/agendas/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>