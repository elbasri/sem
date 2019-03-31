<ul class="mega-container mega-grey" >
<?php foreach($post as $post): 
					?>
				<li class="mega mega-current " style="width:30%;text-align:center;margin-left: 15px" ><a href="<?php echo $post['Aide']['lien'];?>" target="_blank"  class="mega-link btn widthcent2"><font class="widthcent3"><?php echo $post['Aide']['nom'];?></font></a>	</li> 
			<?php  endforeach;?>
			<?php unset($post);?>
</ul>
<div style="clear:both;"></div>
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