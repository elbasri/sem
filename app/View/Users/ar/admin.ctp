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
 <?php echo $this->element('menudetails',array('type'=>'users')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?>  
<table>
<tr>
<th>Numéro</th>
<th>Pseudo</th>
<th>Nom</th>
<th>Email</th>
<th>Type</th>
<th>Statut</th> 
<th>Action</th>
</tr>
<?php foreach($users as $user):?>
<tr>
<td><?php echo $user['User']['id'];?></td>
<td><?php echo $this->Html->link($user['User']['username'],array('controller'=>'users','action'=>'view',$user['User']['id'],Inflector::slug($user['User']['username'],$remplacement='_')));?></td>
<td><?php echo $user['User']['nom'];?></td>
<td><?php echo $user['User']['email'];?></td>
<td><?php 
if($user['User']['id']==1)
	echo '<font color=\'red\'>Super Admin</font>';
else if($user['User']['role']=='admin')
	echo '<font color=\'red\'>'.$user['User']['role'].'</font>';
else if($user['User']['role']=='moderateur')
	echo '<font color=\'#0000FF\'>'.$user['User']['role'].'</font>';
else
	echo '<font color=\'green\'>'.$user['User']['role'].'</font>';
?></td>
<td><?php 
if($user['User']['etat']==0)
	echo '<p style=\'color:red\'>Innactif</p>';
else
	echo '<p style=\'color:green\'>Actif</p>';
?></td>
 
<td>

<?php 
echo $this->Html->link('Modifier',array('controller'=>'users','action'=>'edit',$user['User']['id'])).'&nbsp;&nbsp; ';
echo $this->Form->postLink('Supprimer',array('controller'=>'users','action'=>'delete',$user['User']['id']));
?>
</td>
</tr>
<?php endforeach; unset($users);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['User']['count']>5){
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
		<a href="<?=$this->Html->url('/users/actives')?>" class="mega-link btn widthcent2"><font class="widthcent3">Actives</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/inactives')?>" class="mega-link btn widthcent2"><font class="widthcent3">Inactives</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/users/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
	</ul>
	</div>
</div>
 </div>