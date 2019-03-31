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
<th>Type</th>
<th>Quantité</th>
<th>Date</th>
<th>L'article</th>
<?php if($this->Session->read('typeoperation')=='sortie'){?>
<th>Destination</th>
<th>Plus d'Infos</th>
<?php }?>
<th>Action</th>
</tr>
<?php 
$count=0; $sortie=0; $entree=0; $tauxe=0; $tauxs=0; $taux=0; $qtee=0; $qtes=0; $qte=0;
foreach($post as $post): 
$count++; $taux=$taux+$post['Stockaction']['cout']; $qte=$qte+$post['Stockaction']['qte'];
?>
<tr>
<td><?php echo $post['Stockaction']['id'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['nom'],array('controller'=>'stockactions','action'=>'view',$post['Stockaction']['id'],Inflector::slug($post['Stockaction']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Stockaction']['qte']." ";
	if($post['Stockaction']['type']=="2")
		echo "<strong>".$config['Configuration']['volume']."</strong>";
	else if($post['Stockaction']['type']=="3")
		echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>
<td><?php echo $post['Stockaction']['date'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<?php if($this->Session->read('typeoperation')=='sortie'){
?>
<td><?php 
if($post['Stockaction']['type']==1) echo $this->Html->link($post['Stockaction']['article_nom'],array('controller'=>'inventaires','action'=>'view',$post['Stockaction']['article_id'],Inflector::slug($post['Stockaction']['article_nom'],$replacement ='_')));
else if($post['Stockaction']['type']==2) echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));
else
	echo "Indéfinie";

?></td>
<td><?php if($post['Stockaction']['valeur']!=0){echo $post['Stockaction']['valeurtxt'].": ".$post['Stockaction']['valeur'];} else echo "aucun";?></td>
<?php } 
if($post['Stockaction']['nom']=="sortie"){ $sortie++;  $tauxs=$tauxs+$post['Stockaction']['cout']; $qtes=$qtes+$post['Stockaction']['qte']; }
else { $entree++; $tauxe=$tauxe+$post['Stockaction']['cout']; $qtee=$qtee+$post['Stockaction']['qte'];}?>
<td>
<?php 
echo $this->Form->postLink('Supprimer',array('controller'=>'stockactions','action'=>'supprimer',$post['Stockaction']['id']));
?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Entrées</th>
		<th>Sorties</th>
		<th>Quantité</th>
		<th>Taux</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Nombre: ".$entree; echo "<br>Quantité: ".$qtee; echo "<br>Taux: ".$tauxe;?></td>
		<td><?php echo "Nombre: ".$sortie; echo "<br>Quantité: ".$qtes; echo "<br>Taux: ".$tauxs;?></td>
		<td><?php echo $qte;?></td>
		<td><?php echo $taux;?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Stockaction']['count']>10){
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
		<a href="<?=$this->Html->url('/stockactions/entree')?>" class="mega-link btn widthcent2"><font class="widthcent3">Journale d'entrée</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/sortie')?>" class="mega-link btn widthcent2"><font class="widthcent3">Journale de sortie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/journale')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les opérations</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>