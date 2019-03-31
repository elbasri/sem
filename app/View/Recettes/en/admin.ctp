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
<th>ID</th>
<th>Reference</th>
<th>Date de paiement</th>
<th>Categorie</th>
<th>Théme payée</th>
<th>Compte</th>
<th>Total HT</th>
<th>Total TTC</th>
<th>Action</th>
</tr>
<?php 
$count=0;$counta=0;$countp=0;$counts=0; $tva=0; $ttc=0; $ht=0; $tvaa=0; $tvap=0; $tvas=0; $ttca=0; $ttcp=0; $ttcs=0; $hta=0; $htp=0; $hts=0;
foreach($post as $post): 
$count++; $tva=$tva+$post['Recette']['tva']; $ttc=$ttc+$post['Recette']['total']+$post['Recette']['tva']; $ht=$ht+$post['Recette']['total'];
?>
<tr>
<td><?php echo $post['Recette']['id'];?></td>
<td><?php echo $this->Html->link($post['Recette']['ref'],array('controller'=>'recettes','action'=>'view',$post['Recette']['id'],Inflector::slug($post['Recette']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Recette']['date'];?></td>
<td><?php echo $this->Html->link($post['Recette']['categorie_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Recette']['categorie_id'],Inflector::slug($post['Recette']['categorie_nom'],$replacement ='_')));?></td>
<td><?php 
		$c=$post['Recette']['article'];
			if($c == '1'){
				$counta++;$tvaa=$tvaa+$post['Recette']['tva']; $ttca=$ttca+$post['Recette']['total']+$post['Recette']['tva']; $hta=$hta+$post['Recette']['total'];
				echo "Article du stock: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'materiels','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
			else if($c == '2'){
				$countp++;$tvap=$tvap+$post['Recette']['tva']; $ttcp=$ttcp+$post['Recette']['total']+$post['Recette']['tva']; $htp=$htp+$post['Recette']['total'];
				echo "Produit du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'produits','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
			else if($c == '3'){
				$counts++;$tvas=$tvas+$post['Recette']['tva']; $ttcs=$ttcs+$post['Recette']['total']+$post['Recette']['tva']; $hts=$hts+$post['Recette']['total'];
				echo "Service du site web: ".$this->Html->link($post['Recette']['produit_nom'],array('controller'=>'services','action'=>'view',$post['Recette']['produit_id'],Inflector::slug($post['Recette']['produit_nom'],$replacement ='_')));
			}
;?></td>
<td><?php echo $this->Html->link($post['Recette']['compte_nom'],array('controller'=>'comptes','action'=>'view',$post['Recette']['compte_id'],Inflector::slug($post['Recette']['compte_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Recette']['total']." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $post['Recette']['total']+$post['Recette']['tva']." ".$config['Configuration']['Devises'];?></td>
<td>
<?php 
echo $this->HTML->link('Edit',array('controller'=>'recettes','action'=>'Edit',$post['Recette']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'recettes','action'=>'Delete',$post['Recette']['id']));
?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>Stock</th>
		<th>Produits</th>
		<th>Services</th>
		<th>TVA</th>
		<th>HT</th>
		<th>TTC</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Number: ".$counta."<br>TVA: ".$tvaa." ".$config['Configuration']['Devises']."<br>HT: ".$hta." ".$config['Configuration']['Devises']."<br>TTC: ".$ttca." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$countp."<br>TVA: ".$tvap." ".$config['Configuration']['Devises']."<br>HT: ".$htp." ".$config['Configuration']['Devises']."<br>TTC: ".$ttcp." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$counts."<br>TVA: ".$tvas." ".$config['Configuration']['Devises']."<br>HT: ".$hts." ".$config['Configuration']['Devises']."<br>TTC: ".$ttcs." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $tva." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ht." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Recette']['count']>10){
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
		<a href="<?=$this->Html->url('/recettes/cats')?>" class="mega-link btn widthcent2"><font class="widthcent3">Par Catégorie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tous les recettes</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Add</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Search</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort ascendant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort descending</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Print</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/recettes/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Export</font></a>
		</li>
	</ul>
	</div>
</div>
</div>