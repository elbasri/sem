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
$count=0; $tauxtva=0; $tauxtva2=0; $tauxremise=0; $tauxfrais=0; $totalht=0; $totalttc=0;
foreach($post as $post): 
$count++; $tauxtva=$tauxtva+(($post['Facture']['tva1']*$post['Facture']['montant'])/100); $tauxtva2=$tauxtva2+(($post['Facture']['tva2']*$post['Facture']['montant'])/100); $tauxremise=$tauxremise+((($post['Facture']['remise']*$post['Facture']['montant'])/100)); $tauxfrais=$tauxfrais+((($post['Facture']['frais']*$post['Facture']['montant'])/100)); $totalht=$totalht+$post['Facture']['montant'];
?>
<tr>
<td><?php echo $post['Facture']['id'];?></td>
<td><?php echo $post['Facture']['reference'];?></td>
<td><?php echo $this->Html->link($post['Facture']['nom'],array('controller'=>'factures','action'=>'view',$post['Facture']['id'],Inflector::slug($post['Facture']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['ladate'];?></td>
<td><?php echo $this->Html->link($post['Facture']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Facture']['client_id'],Inflector::slug($post['Facture']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['type']; if($post['Facture']['type']=="Bon de livraison") echo "<br> B.C: ".$this->Html->link($post['Facture']['commande_nom'],array('controller'=>'commandes','action'=>'view',$post['Facture']['commande_id'],Inflector::slug($post['Facture']['commande_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Facture']['montant']." ".$post['Facture']['devise'];?></td>
<td><?php 
$tva1=($post['Facture']['tva1']*$post['Facture']['montant'])/100;
$tva2=($post['Facture']['tva2']*$post['Facture']['montant'])/100;
$montant=$post['Facture']['montant']+$tva1+$tva2;
echo $montant." ".$post['Facture']['devise'];
$totalttc=$totalttc+$montant;
?></td>
<td><?php echo $post['Facture']['etat'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'factures','action'=>'modifier',$post['Facture']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'factures','action'=>'supprimer',$post['Facture']['id']));

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
<th>Frais de dossiers</th>
<th>Taux</th>

<tr>
<td><?php echo $count;?></td>
<td><?php echo $tauxtva." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxtva2." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalht." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxremise." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $tauxfrais." ".$config['Configuration']['Devises'];?></td>
<td><?php echo $totalttc-$tauxremise+$tauxfrais." ".$config['Configuration']['Devises'];?></td>
</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Facture']['count']>10){
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
		<a href="<?=$this->Html->url('/factures/factureventes')?>" class="mega-link btn widthcent2"><font class="widthcent3">Factures de clients</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/bonventes')?>" class="mega-link btn widthcent2"><font class="widthcent3">Bons de livraison</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/factureachats')?>" class="mega-link btn widthcent2"><font class="widthcent3">Factures de fournisseurs</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/bonachats')?>" class="mega-link btn widthcent2"><font class="widthcent3">Bons de réception</font></a>
		</li>
	</ul>
	</div>
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/reglee')?>" class="mega-link btn widthcent2"><font class="widthcent3">Réglée</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/nonreglee')?>" class="mega-link btn widthcent2"><font class="widthcent3">Non réglée</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tous</font></a>
		</li>
	</ul>
	</div>
</div>
  <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/factures/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>