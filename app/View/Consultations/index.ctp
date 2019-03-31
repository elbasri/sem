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
 <?php echo $this->element('menudetails',array('type'=>'pages')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>
<!--<h1>Les pages statique. <?php echo $this->Html->link('Ajouter une page',array('controller'=>'consultations','action'=>'add')); ?></h1>-->
<table>
<tr>
<th>Numéro</th><th>Titre</th><th>Etat</th><th>Slide d'accueil</th><th>Date de création</th><th>Action</th>
</tr>
<?php 
$count=0; $p=0; $b=0;
foreach($post as $post):
$count++;
 ?>
<tr>
<td><?php echo $post['Consultation']['id'];?></td>
<td><?php echo $this->Html->link($post['Consultation']['titre'],array('controller'=>'pages','action'=>'consultation',$post['Consultation']['id'],Inflector::slug($post['Consultation']['titre'],$replacement ='_')));?></td>
<td><?php if($post['Consultation']['etat']=="1"){$p++; echo "<font color='green'>Publiés</font>";} else{ echo "<font color='red'>Brouillon</font>"; $b++;}?></td>
<td><?php if($post['Consultation']['accueil']=="1") echo "<font color='green'>Affiché</font>"; else echo "<font color='red'>Caché</font>";?></td>
<td><?php echo $post['Consultation']['created'];?></td>
<td><?php echo $this->Html->link('Modifier',array('action'=>'edit',$post['Consultation']['id'],Inflector::slug($post['Consultation']['titre'],$replacement ='_'))).' '.$this->Form->postLink('Supprimer',array('action'=>'delete',$post['Consultation']['id']),array('confirm'=>'Vous etes sur ?'));?></td>
</tr>
<?php endforeach;?>
<?php unset($post);?>

</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
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
if($this->params['paging']['Consultation']['count']>15){
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
		<a href="<?=$this->Html->url('/consultations/add')?>" class="mega-link btn widthcent2"><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/consultations/recherche')?>" class="mega-link btn widthcent2"><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/consultations/triasc')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/consultations/tridesc')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tri décroissant</font></a>
		</li>
	</ul>
	</div>
</div>
</div>
