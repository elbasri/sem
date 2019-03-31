<?php  if($test==0){?>
<div class="affichagear">  
		<?php echo $this->Form->create('Aide',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><?php echo $this->Form->input('nom',array('label'=>'كلمة البحث')); ?></td>
		<td><?php echo $this->Form->end('بحث');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>

<ul class="mega-container mega-grey" >
<?php $count=0; foreach($realisation as $post): 
					?>
				<li class="mega mega-current " style="width:30%;text-align:center;margin-left: 15px" ><a href="<?php echo $post['Aide']['lien'];?>" target="_blank"  class="mega-link btn widthcent2"><font class="widthcent3"><?php echo $post['Aide']['nom'];?></font></a>	</li> 
			<?php $count++; endforeach;?>
			<?php unset($post);?>
</ul> <br><div style="clear:both;"></div>
	<h2><?php if($count==0) echo "لم يتم العثور على نتائج";?></h2>
	<h2><a href="recherche" >بحث جديد</a></h2>
<?php }?>