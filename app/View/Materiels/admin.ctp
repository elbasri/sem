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
<th>Numéro d'inventaire</th>
<th>Désignation</th>
<th>Quantité</th>
<?php if($this->Session->read('Auth.User.role')=="admin"){ ?>
<th>Action</th>
<?php } ?>
</tr>
<?php
/*$count=0;
$qte=0;
$cout=0;
$coutv=0;*/
 foreach($post as $post): 
/*$count++;
$qte=$qte+$post['Materiel']['qte'];
$cout=$cout+$post['Materiel']['prix'];*/
//$coutv=$coutv+($post['Materiel']['prixv']*$post['Materiel']['qte']);
 ?>
<tr>
<td><?php if($post['Materiel']['ref']!=null) echo $post['Materiel']['ref']; else echo "___";?></td>
<td><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Materiel']['qte']." ";
if($post['Materiel']['type']=="2")
	echo "<strong>".$config['Configuration']['volume']."</strong>";
else if($post['Materiel']['type']=="3")
	echo "<strong>".$config['Configuration']['poids']."</strong>";
?>
</td>
<!--<td><?php echo $this->Html->link($post['Materiel']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Materiel']['fournisseur_id'],Inflector::slug($post['Materiel']['fournisseur_nom'],$remplacement='_')));?></td>
-->
<td>
<?php 
if($this->Session->read('Auth.User.role')=="admin"){
echo $this->HTML->link('Modifier',array('controller'=>'materiels','action'=>'modifier',$post['Materiel']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'materiels','action'=>'supprimer',$post['Materiel']['id']));
}

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>
<?php /* <h3>Résumé</h3>
<table>
	<tr>
		<th>Articles</th>
		<th>Quantités</th>
		<th>Prix d'achats</th>
		<th>Totale</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $qte;?></td>
		<td><?php echo $cout." ".$config['Configuration']['Devises'];?></td>
		<td><?php $totale=$cout*$qte; echo $totale." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<?php */ ?>
<div class='pagination'>
<?php
if($this->params['paging']['Materiel']['count']>10){
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
		<a href="<?=$this->Html->url('/materiels/magasins')?>" class="mega-link btn widthcent2"><font class="widthcent3">Par Magasins</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/z')?>" class="mega-link btn widthcent2"><font class="widthcent3">Quantité<0</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/nz')?>" class="mega-link btn widthcent2"><font class="widthcent3">Quantité>0</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les articles</font></a>
		</li>
	</ul>
	</div>
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
		<a href="<?=$this->Html->url('/materiels/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/materiels/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>
