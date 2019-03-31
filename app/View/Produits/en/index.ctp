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
 <?php echo $this->element('menudetails',array('type'=>'produits')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<table >
<tr>
<th>ID</th>
<th>Libellé</th>
<th>Prix</th>
<th>Etat</th>
<th>Date de création</th>
<th>Action</th>
</tr>
<?php 
$count=0; $p=0; $b=0;
foreach($post as $post):
$count++;
 ?>
<tr>
<td><?php echo $post['Produit']['id'];?></td>
<td><?php echo $this->Html->link($post['Produit']['titre'],array('controller'=>'produits','action'=>'voir',$post['Produit']['id'],Inflector::slug($post['Produit']['titre'],$replacement ='_')));?></td>
<td><?php echo $post['Produit']['prix'];?></td>
<td><?php if($post['Produit']['etat']=="1") {$p++; echo "<font color='green'>Publiés</font>";} else{$b++; echo "<font color='red'>Brouillon</font>";}?></td>
<td><?php echo $post['Produit']['created'];?></td>
<td>
<?php 
echo $this->HTML->link('Edit',array('controller'=>'produits','action'=>'Edit',$post['Produit']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'produits','action'=>'Delete',$post['Produit']['id']));

?>
</td>
<tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th>Publiés</th>
		<th>Brouillons</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $p;?></td>
		<td><?php echo $b;?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Produit']['count']>5){
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
		<a href="<?=$this->Html->url('/produits/add')?>" class="mega-link btn widthcent2"><font class="widthcent3">Add</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/produits/recherche')?>" class="mega-link btn widthcent2"><font class="widthcent3">Search</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/produits/triasc')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sort ascendant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/produits/tridesc')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sort descending</font></a>
		</li>
	</ul>
	</div>
</div>
</div>