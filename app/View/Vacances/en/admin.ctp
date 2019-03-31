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
<th>ID</th><th>Reference</th>
<th>Due of leave</th>
<th>Type of leave</th>
<th>Current Status</th>
<th>The employee</th>
<th>Action</th>
</tr>
<?php 
$count=0; $t=0; $e=0; $v=0; $ttc=0; $ttct=0; $ttce=0; $ttcv=0;
foreach($post as $post):
$count++; $ttc=$ttc+$post['Vacance']['cout'];
 ?>
<tr>
<td><?php echo $post['Vacance']['id'];?></td>
<td><?php echo $post['Vacance']['ref'];?></td>
<td><?php echo $this->Html->link($post['Vacance']['nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['id'],Inflector::slug($post['Vacance']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Vacance']['type'];?></td>
<td><?php if(date('Y-m-d')>$post['Vacance']['datef']){$t++; $ttct=$ttct+$post['Vacance']['cout']; echo "<font color='red'>leave Done</font>";} else if(date('Y-m-d')<=$post['Vacance']['datef'] && date('Y-m-d')>=$post['Vacance']['dated']){$e++; $ttce=$ttce+$post['Vacance']['cout'];echo "<font color='green'>Current leave</font>";} else if (date('Y-m-d')<$post['Vacance']['dated']){$v++; $ttcv=$ttcv+$post['Vacance']['cout'];echo "<font color='blue'>Upcoming leave</font>";}?></td>
<td><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></td>
<td>
<?php 
echo $this->HTML->link('Edit',array('controller'=>'vacances','action'=>'Edit',$post['Vacance']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'vacances','action'=>'Delete',$post['Vacance']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Number</th>
		<th> Completed </th>
		<th> Outstanding </th>
		<th> Upcoming </th>
		<th> Rate </th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo "Number: ".$t."<br>Rate: ".$ttct." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$e."<br>Rate: ".$ttce." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo "Number: ".$v."<br>Rate: ".$ttcv." ".$config['Configuration']['Devises'];?></td>
		<td><?php echo $ttc." ".$config['Configuration']['Devises'];?></td>
	</tr>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Vacance']['count']>10){
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
		<a href="<?=$this->Html->url('/vacances/t')?>" class="mega-link btn widthcent2"><font class="widthcent3">leave Dones</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/e')?>" class="mega-link btn widthcent2"><font class="widthcent3">Current leave</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/a')?>" class="mega-link btn widthcent2"><font class="widthcent3">Upcoming leaves</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/tout')?>" class="mega-link btn widthcent2"><font class="widthcent3">All leaves</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Add</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Search</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort ascendant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Sort descending</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Print</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/vacances/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Export</font></a>
		</li>
	</ul>
	</div>
</div>
</div>