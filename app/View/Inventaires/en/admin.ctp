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
 <?php echo $this->element('menudetails',array('type'=>'inventaire')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>   
<table >
<tr>
<th>ID</th>
<th>Reference</th>
<th>Libellé</th>
<th>Magasin</th>
<th>Créé le</th>
<th>Modifié le</th>
<th>Fournisseur</th>
<th>Action</th>
</tr>
<?php
$count=0; $qte=0; $cout=0;$coutv=0;
 foreach($post as $post): 
$count++;
$qte=$qte+$post['Inventaire']['qte'];
$cout=$cout+$post['Inventaire']['cout'];
$coutv=$coutv+($post['Inventaire']['prixv']*$post['Inventaire']['qte']);
 ?>
<tr>
<td><?php echo $post['Inventaire']['id'];?></td>
<td><?php echo $post['Inventaire']['ref'];?></td>
<td><?php echo $this->Html->link($post['Inventaire']['nom'],array('controller'=>'inventaires','action'=>'view',$post['Inventaire']['id'],Inflector::slug($post['Inventaire']['nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Inventaire']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Inventaire']['piece_id'],Inflector::slug($post['Inventaire']['piece_nom'],$remplacement='_')));?></td>
<td><?php echo $post['Inventaire']['created'];?></td>
<td><?php echo $post['Inventaire']['modified'];?></td>
<td><?php echo $this->Html->link($post['Inventaire']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fournisseur_id'],Inflector::slug($post['Inventaire']['fournisseur_nom'],$remplacement='_')));?></td>
<td>
<?php 
echo $this->HTML->link('Edit',array('controller'=>'inventaires','action'=>'Edit',$post['Inventaire']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'inventaires','action'=>'Delete',$post['Inventaire']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Les biens</th>
		<th>Quantités</th>
		<th>Prix d'achats</th>
		<th>Valeurs Marchandes</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $qte;?></td>
		<td><?php echo $cout." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $coutv." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Inventaire']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Previous').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('Next').'</p>';
echo $this->Paginator->counter('Page {:page} of {:pages} Pages');
 }
 ?>
 </div>
  <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat1')?>" class="mega-link btn widthcent2"><font class="widthcent3">Meubles</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat2')?>" class="mega-link btn widthcent2"><font class="widthcent3">Eletroménager</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat3')?>" class="mega-link btn widthcent2"><font class="widthcent3">Informatique</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat4')?>" class="mega-link btn widthcent2"><font class="widthcent3">Phoneéphonie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat5')?>" class="mega-link btn widthcent2"><font class="widthcent3">Hi-Tech</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat6')?>" class="mega-link btn widthcent2"><font class="widthcent3">Véhicule</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat7')?>" class="mega-link btn widthcent2"><font class="widthcent3">Autres</font></a>
		</li>
	</ul>
	</div>
</div>

<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. de garatnie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. de Maintenance</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. d'assurance</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. de location</font></a>
		</li>
	</ul>
	</div>
</div>

<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/localisations')?>" class="mega-link btn widthcent2"><font class="widthcent3">localisation</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/fournisseurs')?>" class="mega-link btn widthcent2"><font class="widthcent3">Fournisseur</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/marques')?>" class="mega-link btn widthcent2"><font class="widthcent3">Marque</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/familles')?>" class="mega-link btn widthcent2"><font class="widthcent3">Famille</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/tous')?>" class="mega-link btn widthcent2"><font class="widthcent3">Afficher Tous</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Add</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Search</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort ascendant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort descending</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Print</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Export</font></a>
		</li>
	</ul>
	</div>
</div>
</div>