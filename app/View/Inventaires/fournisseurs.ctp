<div class="affichage">

<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
<?php $count=0; foreach($post as $post): ?>

		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/fournisseurs/').$post['Client']['nom']?>" class="mega-link btn widthcent2"><font class="widthcent3"><?php echo $post['Client']['nom'];?></font></a>
		</li>
<?php $count++; endforeach; unset($post);?>
<?php if($count==0) echo "<h2>La liste de fournisseurs est vide !</h2>";?>
	</ul>
	</div>
</div>

 </div>
