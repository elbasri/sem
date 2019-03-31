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
 <?php echo $this->element('menudetails',array('type'=>'employes')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>État actuel</th>
<th>L'employe</th>
<th>Le Projet</th>
<th>Action</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $v=0;
foreach($post as $post): 
$count++;
?>
<tr>
<td><?php echo $post['Tache']['id'];?></td>
<td><?php echo $post['Tache']['ref'];?></td>
<td><?php echo $this->Html->link($post['Tache']['nom'],array('controller'=>'taches','action'=>'view',$post['Tache']['id'],Inflector::slug($post['Tache']['nom'],$replacement ='_')));?></td>
<td><?php if(date('Y-m-d')>$post['Tache']['datef']){$t++; echo "<font color='red'>Tache Terminé</font>"; }else if(date('Y-m-d')<=$post['Tache']['datef'] && date('Y-m-d')>=$post['Tache']['dated']){$e++; echo "<font color='green'>Tache encours</font>"; }else if (date('Y-m-d')<$post['Tache']['dated']){$v++; echo "<font color='blue'>Tache à venir</font>";}?></td>
<td><?php echo $this->Html->link($post['Tache']['employe_nom'],array('controller'=>'employes','action'=>'view',$post['Tache']['employe_id'],Inflector::slug($post['Tache']['employe_nom'],$replacement ='_')));?></td>
<td><?php echo $this->Html->link($post['Tache']['projet_nom'],array('controller'=>'projets','action'=>'view',$post['Tache']['projet_id'],Inflector::slug($post['Tache']['projet_nom'],$replacement ='_')));?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'taches','action'=>'modifier',$post['Tache']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'taches','action'=>'supprimer',$post['Tache']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre</th>
		<th>Terminés</th>
		<th>Encours</th>
		<th>A venir</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $t;?></td>
		<td><?php echo $e;?></td>
		<td><?php echo $v;?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Tache']['count']>10){
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
		<a href="<?=$this->Html->url('/taches/t')?>" class="mega-link btn widthcent2"><font class="widthcent3">Taches terminés</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/e')?>" class="mega-link btn widthcent2"><font class="widthcent3">Taches encours</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/a')?>" class="mega-link btn widthcent2"><font class="widthcent3">Taches à venir</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les Taches</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/taches/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
		</li>
	</ul>
	</div>
</div>
</div>