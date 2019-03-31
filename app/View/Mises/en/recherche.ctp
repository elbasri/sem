<?php  if($test==0){?>
<div class="affichage">  
		<?php echo $this->Form->create('Mise',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><?php echo $this->Form->input('nom',array('label'=>'Mot clé')); ?></td>
		<td><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>

<ul class="mega-container mega-grey" >
<?php $count=0; foreach($realisation as $post): 
					?>
				<li class="mega mega-current " style="width:30%;text-align:center;margin-left: 15px" ><a href="<?php echo $post['Mise']['lien'];?>" target="_blank"  class="mega-link btn widthcent2"><font class="widthcent3"><?php echo $post['Mise']['nom'];?></font></a>	</li>
			<?php $count++; endforeach;?>
			<?php unset($post);?>
</ul> <br><div style="clear:both;"></div>
	<h2><?php if($count==0) echo "No Result!";?></h2>
	<h2><a href="recherche" >New Search</a></h2>
<?php }?>