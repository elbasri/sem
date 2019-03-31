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
 <?php echo $this->element('menudetails',array('type'=>'compta')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Intitulé</th>
<th>Date</th>
<th>Client</th>
<th>Type</th>
<th>Total HT</th>
<th>Total TTC</th>
<th>Statut</th>
<th>Action</th>
</tr>
<?php 
$count=0; $tauxtva=0; $tauxtva2=0; $tauxremise=0; $totalht=0; $totalttc=0;
foreach($post as $post): 
$count++; $tauxtva=$tauxtva+(($post['Devise']['tva1']*$post['Devise']['montant'])/100); $tauxtva2=$tauxtva2+(($post['Devise']['tva2']*$post['Devise']['montant'])/100); $tauxremise=$tauxremise+(($post['Devise']['remise']*$post['Devise']['montant'])/100); $totalht=$totalht+$post['Devise']['montant'];
?>
<tr>
<td><?php echo $post['Devise']['id'];?></td>
<td><?php echo $post['Devise']['reference'];?></td>
<td><?php echo $this->Html->link($post['Devise']['nom'],array('controller'=>'devises','action'=>'view',$post['Devise']['id'],Inflector::slug($post['Devise']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Devise']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Devise']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Devise']['client_id'],Inflector::slug($post['Devise']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Devise']['type'];?></td>
<td><?php echo $post['Devise']['montant']." ".$post['Devise']['devise'];?></td>
<td><?php
$tva1=($post['Devise']['tva1']*$post['Devise']['montant'])/100;
$tva2=($post['Devise']['tva2']*$post['Devise']['montant'])/100;
$montant=$post['Devise']['montant']+$tva1+$tva2;
 echo $montant." ".$post['Devise']['devise'];
$totalttc=$totalttc+$montant;
 ?></td>
<td><?php echo $post['Devise']['etat'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'devises','action'=>'modifier',$post['Devise']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'devises','action'=>'supprimer',$post['Devise']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
<th>Nombre</th>
<th>TVA</th>
<th>TVA2</th>
<th>HT</th>
<th>TTC</th>
<th>Remises</th>
<th>Taux</th>

<tr>
<td><?php echo $count;?></td>
<td><?php echo $tauxtva." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxtva2." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalht." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxremise." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc-$tauxremise." ".$config['Configuration']['Devises'];?></td>
</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Devise']['count']>10){
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
		<a href="<?=$this->Html->url('/devises/s')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sans réponse</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/a')?>" class="mega-link btn widthcent2"><font class="widthcent3">Accepté</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/r')?>" class="mega-link btn widthcent2"><font class="widthcent3">Refusé</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/t')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les devis</font></a>
		</li>
	</ul>
	</div>
</div>
  <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/devises/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>