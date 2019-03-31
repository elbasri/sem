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
 <?php echo $this->element('menudetails',array('type'=>'stock')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<table >
<tr>
<th>Numéro</th>
<th>Libellé</th>
<th>État actuel</th>
<th>L'article</th>
<th>Action</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $p=0;
foreach($post as $post): $count++; ?>
<tr>
<td><?php echo $post['Maintenance']['id'];?></td>
<td><?php echo $this->Html->link($post['Maintenance']['nom'],array('controller'=>'maintenances','action'=>'view',$post['Maintenance']['id'],Inflector::slug($post['Maintenance']['nom'],$replacement ='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Maintenance']['datef']){$t++; echo "<font color='red'>Maintenance Terminé</font>"; }else if(date('Y-m-d')<=$post['Maintenance']['datef'] && date('Y-m-d')>=$post['Maintenance']['dated']){$e++; echo "<font color='green'>Maintenance encours</font>"; }else if (date('Y-m-d')<$post['Maintenance']['dated']){$p++; echo "<font color='blue'>Maintenance planifié</font>";}?></td>
<td><?php echo $this->Html->link($post['Maintenance']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Maintenance']['materiel_id'],Inflector::slug($post['Maintenance']['materiel_nom'],$replacement ='_')));?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'maintenances','action'=>'modifier',$post['Maintenance']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'Maintenances','action'=>'supprimer',$post['Maintenance']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Treminés</th>
		<th>Encours</th>
		<th>Planifiés</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $t;?></td>
		<td><?php echo $e;?></td>
		<td><?php echo $p;?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Maintenance']['count']>10){
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
		<a href="<?=$this->Html->url('/maintenances/t')?>" class="mega-link btn widthcent2"><font class="widthcent3">Maintenances treminés</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/e')?>" class="mega-link btn widthcent2"><font class="widthcent3">Maintenances encours</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/a')?>" class="mega-link btn widthcent2"><font class="widthcent3">Maintenances planifiés</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les Maintenances</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/maintenances/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>