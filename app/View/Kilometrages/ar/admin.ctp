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
 <?php echo $this->element('menudetails',array('type'=>'comptat')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Date</th>
<th>Type</th>
<th>Véhicule</th>
<th>Distance</th>
<th>Totale (TTC)</th>
<th>Action</th>
</tr>
<?php 
$count=0; $countd=0; $countc=0; $ttc=0; $ttcd=0; $ttcc=0;
foreach($post as $post): 
$count++; $ttc=$ttc+$post['Kilometrage']['taux'];
if($post['Kilometrage']['type']=="professionnelle"){
	$ttcd=$ttcd+$post['Kilometrage']['taux'];
	$countd++;
}
if($post['Kilometrage']['type']=="personnelle"){
	$ttcc=$ttcc+$post['Kilometrage']['taux'];
	$countc++;
}
?>
<tr>
<td><?php echo $post['Kilometrage']['id'];?></td>
<td><?php echo $this->Html->link($post['Kilometrage']['ref'],array('controller'=>'kilometrages','action'=>'view',$post['Kilometrage']['id'],Inflector::slug($post['Kilometrage']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Kilometrage']['date'];?></td>
<td><?php echo $post['Kilometrage']['type'];?></td>
<td><?php echo $this->Html->link($post['Kilometrage']['inventaire_nom'],array('controller'=>'Inventaires','action'=>'view',$post['Kilometrage']['inventaire_id'],Inflector::slug($post['Kilometrage']['inventaire_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Kilometrage']['distance']." ".$config['Configuration']['distance'];?></td>
<td><?php echo $post['Kilometrage']['total']." ".$config['Configuration']['Devises'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'kilometrages','action'=>'modifier',$post['Kilometrage']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'kilometrages','action'=>'supprimer',$post['Kilometrage']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Professionnelle</th>
		<th>Personnelle</th>
		<th>Taux</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Nombre: ".$countd."<br>Taux: ".$ttcd." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Nombre: ".$countc."<br>Taux: ".$ttcc." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Kilometrage']['count']>10){
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
		<a href="<?=$this->Html->url('/kilometrages/professionnelle')?>" class="mega-link btn widthcent2"><font class="widthcent3">Professionnelle</font></a>
		</li>			
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/personnelle')?>" class="mega-link btn widthcent2"><font class="widthcent3">Personnelle</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tous les Kilometrages</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/kilometrages/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>