<div class="affichagear"> 
<table>
<tr>
<th>عمليات</th>
<th>الرابط</th>
<th>العنوان</th>
<th>الرقم</th>
</tr>
<?php foreach($post as $post): ?>
<tr>
<td>
<?php 
echo $this->HTML->link('تعديل',array('controller'=>'aides','action'=>'modifier',$post['Aide']['id'])).' '.$this->Form->postLink('إزالة',array('controller'=>'aides','action'=>'supprimer',$post['Aide']['id']));
?>
</td>
<td><?php echo $post['Aide']['lien'];?></td>
<td><?php echo $this->Html->link($post['Aide']['nom'],array('controller'=>'aides','action'=>'view',$post['Aide']['id'],Inflector::slug($post['Aide']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Aide']['id'];?></td>
</tr>
<?php endforeach; unset($post);?>
</table>
<div class='pagination'>
<?php
if($this->params['paging']['Aide']['count']>9){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('السابق').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('التالي').'</p>';
 }
 ?>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/aides/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">ترتيب تنازلي</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/aides/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">ترتيب تصاعدي</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/aides/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">البحث</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/aides/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">إضافة</font></a>
		</li>
	</ul>
	</div>
</div>
</div>